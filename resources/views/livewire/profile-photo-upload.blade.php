<div x-data="{ 
    profilePhoto: '{{ $user && $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('/storage/images/default-avatar.png') }}',
    editing: false // Track if in edit mode
}"
x-init="$watch('profilePhoto', value => $wire.set('photo', value))"
class="w-full lg:w-1/3 flex justify-center">

    <!-- Livewire Form -->
    <form wire:submit.prevent="save" class="w-full">
        <div class="bg-white shadow-lg p-6 rounded-md h-3/6 w-[90%] text-center relative">
            <img src="/storage/images/designProfile.png" alt="Design Profile"
                class="absolute right-0 top-0 h-full object-cover opacity-70 z-0 pointer-events-none">

            <div class="profile-photo relative z-10">
                <!-- Use Alpine.js to determine the image source -->
                <img :src="profilePhoto"
                    class="w-32 mt-6 h-32 rounded-full mx-auto object-cover shadow-sm border-4 border-white"
                    alt="User Photo">

                <!-- Upload Photo Input -->
                <input type="file" class="hidden border border-gray-500" id="photo" wire:model="photo" accept="image/*"
                    x-ref="profilePhotoInput" @change="profilePhoto = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : '{{ $user && $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('/storage/images/default-avatar.png') }}'">

                <!-- Name and Role Section -->
                <p class="font-medium text-[14px] mt-4">{{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}</p>
                <p class="text-[13px] ml-2 font-medium text-gray-500">{{ Auth::user()->getRoleNames()->first() }}</p>

                <!-- Button Container for Conditional Rendering -->
                <div class="flex justify-center space-x-4 mt-8">
                    <!-- "Edit Photo" button, visible when not editing -->
                    <button type="button" 
                        x-show="!editing"
                        class="px-4 py-2 bg-green-500 hover:bg-green-600 rounded-full text-white text-sm"
                        @click.prevent="editing = true; $refs.profilePhotoInput.click()">
                        Edit Photo
                    </button>

                    <!-- "Save" and "Cancel" buttons, visible when editing -->
                    <div x-show="editing" class="flex space-x-4">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-green-500 hover:bg-green-600 rounded-full text-sm">
                            Save
                        </button>

                        <button type="button"
                            class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 text-sm"
                            @click.prevent="editing = false; profilePhoto = '{{ $user && $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('/storage/images/default-avatar.png') }}'">
                            Cancel
                        </button>
                    </div>
                </div>

                @error('photo') <span class="error text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('profile-updated', function() {
        window.location.reload(); // Reload the page
    });
</script>