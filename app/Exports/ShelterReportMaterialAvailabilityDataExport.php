<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;
use App\Models\Shelter\Material; // Make sure this model exists
use Maatwebsite\Excel\Concerns\Exportable;

class ShelterReportMaterialAvailabilityDataExport implements FromView, ShouldAutoSize, WithEvents, WithStyles, WithDrawings
{
    use Exportable;

    private $filters;
    private $materials = [];
    private $prPoHeaders = [];
    private $selectedPrPo = null; // Track selected PR-PO combination
    private $isFiltered = false; // Flag to track if a filter is applied
    private $groupedMaterials = [];
    

    public function __construct($filters = null)
    {
        $this->filters = $filters;
    }

    private function getTitle(): string
    {
        $title = 'REPORT ON AVAILABILITY OF MATERIALS UNDER THE SHELTER ASSISTANCE PROGRAM';

        return $title;
    }


    public function view(): View
{
    $query = DB::table('materials')
        ->join('material_units', 'materials.material_unit_id', '=', 'material_units.id')
        ->leftJoin('purchase_orders', 'materials.purchase_order_id', '=', 'purchase_orders.id')
        ->leftJoin('purchase_requisitions', 'purchase_orders.purchase_requisition_id', '=', 'purchase_requisitions.id')
        ->leftJoin('delivered_materials', 'materials.id', '=', 'delivered_materials.material_id')
        ->select(
            'materials.id as material_id',
            'materials.item_description as item_description',
            'material_units.unit as unit',
            DB::raw('SUM(materials.quantity) as total_quantity'),
            DB::raw('SUM(delivered_materials.grantee_quantity) as delivered_quantity'),
            DB::raw('SUM(materials.quantity - COALESCE(delivered_materials.grantee_quantity, 0)) as available_quantity'),
            'purchase_requisitions.pr_number',
            'purchase_orders.po_number'
        )
        ->groupBy(
            'materials.id',
            'materials.item_description',
            'material_units.unit',
            'purchase_requisitions.pr_number',
            'purchase_orders.po_number'
        );

    // Apply filters if needed
    if (!empty($this->filters['po_number']) && !empty($this->filters['pr_number'])) {
        $query->where('purchase_requisitions.pr_number', $this->filters['pr_number'])
              ->where('purchase_orders.po_number', $this->filters['po_number']);
        $this->isFiltered = true;
    } else {
        $this->isFiltered = false;
    }

    // Get the data as a flat array
    $this->materials = $query->get();

    $this->fetchPrPoHeaders();

    return view('exports.shelter-report-availability-materials', [
        'materials' => $this->materials, // Flat array of materials
        'title' => $this->getTitle(),
        'isFiltered' => $this->isFiltered, // Pass filter flag
        'prPoHeaders' => $this->prPoHeaders, // Pass PR-PO headers
    ]);
}

    

    public function fetchPrPoHeaders()
    {
        $this->prPoHeaders = DB::table('purchase_orders')
            ->join('purchase_requisitions', 'purchase_orders.purchase_requisition_id', '=', 'purchase_requisitions.id')
            ->select(
                'purchase_requisitions.pr_number',
                'purchase_orders.po_number'
            )
            ->distinct()
            ->get();
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 16]], // Title
            2 => ['font' => ['bold' => true, 'size' => 12]], // Column headers
        ];
    }

    public function drawings(): array
    {
        $drawings = [];

        // Left Logo
        $leftDrawing = new Drawing();
        $leftDrawing->setName('Left Logo');
        $leftDrawing->setDescription('Left Logo');
        $leftDrawing->setPath(public_path('storage/images/logo-left.png')); // Update path if necessary
        $leftDrawing->setHeight(100); // Adjust height as needed
        $leftDrawing->setCoordinates('A2'); // Starting cell
        $leftDrawing->setOffsetX(5); // Fine-tune horizontal positioning
        $leftDrawing->setOffsetY(5); // Fine-tune vertical positioning

        // Right Logo
        $rightDrawing = new Drawing();
        $rightDrawing->setName('Right Logo');
        $rightDrawing->setDescription('Right Logo');
        $rightDrawing->setPath(public_path('storage/images/logo-right.png')); // Update path if necessary
        $rightDrawing->setHeight(100); // Adjust height as needed
        $rightDrawing->setCoordinates('G2'); // Starting cell for the right logo
        $rightDrawing->setOffsetX(5); // Fine-tune horizontal positioning
        $rightDrawing->setOffsetY(5); // Fine-tune vertical positioning

        $drawings[] = $leftDrawing;
        $drawings[] = $rightDrawing;

        return $drawings;
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $sheet->getPageSetup()->setFitToWidth(1);
                $sheet->getPageMargins()->setTop(0.5)->setRight(0.5)->setBottom(0.5)->setLeft(0.5);
            },
        ];
    }
}
