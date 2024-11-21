<div class="bg-none shadow-md font-poppins text-black 0 p-0 " x-data="{ open: false, activeLink: localStorage.getItem('activeLink') || '', activeChildLink: localStorage.getItem('activeChildLink') || '' }">

    <div class="flex h-[100vh]">
        <!-- Sidebar -->
        <aside :class="open ? 'block' : 'hidden md:block'" class="fixed w-[17%] bg-[#ffffff] max-h-screen  py-3 pl-4 pr-2 md:block mr-2 pb-[8px] shadow-lg ">
            <div class="text-20 font-bold mb-4 ml-1 flex items-center ">
                <div class="w-[85%] h-auto inline-block">
                    <a href="{{ route('dashboard') }}" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"><x-application-sidebar-logo /></a>
                </div>
            </div>
            <!-- SIDEBAR MENU -->
            <nav class="space-y-2 mt-15 flex-1 text-[13px] h-[calc(100vh-4rem)] overflow-auto scrollbar-hidden" x-data="{
                    activeLink: localStorage.getItem('activeLink') || '',
                    activeChildLink: localStorage.getItem('activeChildLink') || ''}">
                <div x-data="{ isDashboardOpen: false }">
                    <!-- Main Dashboard Menu -->
                    <a href="#" @click="isDashboardOpen = !isDashboardOpen; activeLink = 'dashboard'; localStorage.setItem('activeLink', 'dashboard')"
                       :class="{ 'bg-[#D9D9D9] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'dashboard' }"
                       class="mx-2 flex items-center justify-between py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">
                                <path d=""></path>
                            </svg>
                            <p class="ml-2">Dashboard</p>
                        </div>
                        <svg :class="{ 'transform rotate-180': isDashboardOpen }"
                             class="w-4 h-4 transition-transform duration-200"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>

                    <!-- Dashboard Submenus -->
                    <div x-show="isDashboardOpen" x-transition class="ml-4">
                        <!-- Housing Submenu -->
                        @role('Admin')
                            <!-- Housing menu will be shown for Housing System Admin only -->
                            <a href="{{ route('dashboard') }}"
                               @click="activeChildLink = 'dashboard';
                               localStorage.setItem('activeChildLink', 'dashboard')"
                               :class="{ 'text-[#FF9100] font-bold': activeChildLink === 'dashboard' }"
                               class="flex items-center py-2 px-4 hover:text-[#FF9100]">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     class="w-5 h-5">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                <span class="ml-2">Housing</span>
                            </a>
                        @endrole

                        <!-- Shelter Submenu will be hidden for Housing System Admin role -->
{{--                        @role('ShelterAdmin')--}}
{{--                            <a href="{{ route('shelter-dashboard') }}"--}}
{{--                               @click="activeChildLink = 'shelter-dashboard';--}}
{{--                                localStorage.setItem('activeChildLink', 'shelter-dashboard')"--}}
{{--                               :class="{ 'text-[#FF9100] font-bold': activeChildLink === 'shelter-dashboard' }"--}}
{{--                               class="flex items-center py-2 px-4 hover:text-[#FF9100]">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg"--}}
{{--                                     fill="none"--}}
{{--                                     viewBox="0 0 24 24"--}}
{{--                                     stroke="currentColor"--}}
{{--                                     stroke-width="2"--}}
{{--                                     class="w-5 h-5">--}}
{{--                                    <path stroke-linecap="round"--}}
{{--                                          stroke-linejoin="round"--}}
{{--                                          d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />--}}
{{--                                </svg>--}}
{{--                                <span class="ml-2">Shelter</span>--}}
{{--                            </a>--}}
{{--                        @endrole--}}

                        <!-- User Management Submenu -->

                            <a href="{{ route('dashboard') }}" @click="activeChildLink = 'dashboard'; localStorage.setItem('activeChildLink', 'dashboard')"
                               :class="{ 'text-[#FF9100] font-bold': activeChildLink === 'dashboard' }"
                               class="flex items-center py-2 px-4 hover:text-[#FF9100]">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     class="w-5 h-5">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                <span class="ml-2">Housing</span>
                            </a>
                            <a href="{{ route('shelter-dashboard') }}"
                               @click="activeChildLink = 'shelter-dashboard';
                                    localStorage.setItem('activeChildLink', 'shelter-dashboard')"
                               :class="{ 'text-[#FF9100] font-bold': activeChildLink === 'shelter-dashboard' }"
                               class="flex items-center py-2 px-4 hover:text-[#FF9100]">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     class="w-5 h-5">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                                </svg>
                                <span class="ml-2">Shelter</span>
                            </a>
                            <a href="{{ route('user-role-management') }}"
                               @click="activeChildLink = 'user-role-management';
                               localStorage.setItem('activeChildLink', 'user-role-management')"
                               :class="{ 'text-[#FF9100] font-bold': activeChildLink === 'user-role-management' }"
                               class="flex items-center py-2 px-4 hover:text-[#FF9100]">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     class="w-5 h-5">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                                <span class="ml-2">User Management</span>
                            </a>
                    </div>
                </div>

                <a href="{{ route('masterlist-applicants') }}" @click="activeLink = 'applicants'; activeChildLink = ''; localStorage.setItem('activeLink', 'applicants'); localStorage.setItem('activeChildLink', '')" :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'applicants' }" class="mx-2 flex items-center  py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[12px] hover:text-[#FF9100]">

                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">
                        <path d="M 23.984375 5.9863281 A 1.0001 1.0001 0 0 0 23 7 L 23 13 A 1.0001 1.0001 0 1 0 25 13 L 25 7 A 1.0001 1.0001 0 0 0 23.984375 5.9863281 z M 13.869141 9.8691406 A 1.0001 1.0001 0 0 0 13.171875 11.585938 L 17.414062 15.828125 A 1.0001 1.0001 0 1 0 18.828125 14.414062 L 14.585938 10.171875 A 1.0001 1.0001 0 0 0 13.869141 9.8691406 z M 34.101562 9.8691406 A 1.0001 1.0001 0 0 0 33.414062 10.171875 L 29.171875 14.414062 A 1.0001 1.0001 0 1 0 30.585938 15.828125 L 34.828125 11.585938 A 1.0001 1.0001 0 0 0 34.101562 9.8691406 z M 24 16 C 22.458334 16 21.112148 16.632133 20.253906 17.597656 C 19.395664 18.563179 19 19.791667 19 21 C 19 22.208333 19.395664 23.436821 20.253906 24.402344 C 21.112148 25.367867 22.458334 26 24 26 C 25.541666 26 26.887852 25.367867 27.746094 24.402344 C 28.604336 23.436821 29 22.208333 29 21 C 29 19.791667 28.604336 18.563179 27.746094 17.597656 C 26.887852 16.632133 25.541666 16 24 16 z M 24 19 C 24.791666 19 25.195482 19.242867 25.503906 19.589844 C 25.81233 19.936821 26 20.458333 26 21 C 26 21.541667 25.81233 22.063179 25.503906 22.410156 C 25.195482 22.757133 24.791666 23 24 23 C 23.208334 23 22.804518 22.757133 22.496094 22.410156 C 22.18767 22.063179 22 21.541667 22 21 C 22 20.458333 22.18767 19.936821 22.496094 19.589844 C 22.804518 19.242867 23.208334 19 24 19 z M 9 22 C 7.4583337 22 6.1121484 22.632133 5.2539062 23.597656 C 4.3956641 24.563179 4 25.791667 4 27 C 4 28.208333 4.3956641 29.436821 5.2539062 30.402344 C 6.1121484 31.367867 7.4583337 32 9 32 C 10.541666 32 11.887852 31.367867 12.746094 30.402344 C 13.604336 29.436821 14 28.208333 14 27 C 14 25.791667 13.604336 24.563179 12.746094 23.597656 C 11.887852 22.632133 10.541666 22 9 22 z M 39 22 C 37.458334 22 36.112148 22.632133 35.253906 23.597656 C 34.395664 24.563179 34 25.791667 34 27 C 34 28.208333 34.395664 29.436821 35.253906 30.402344 C 36.112148 31.367867 37.458334 32 39 32 C 40.541666 32 41.887852 31.367867 42.746094 30.402344 C 43.604336 29.436821 44 28.208333 44 27 C 44 25.791667 43.604336 24.563179 42.746094 23.597656 C 41.887852 22.632133 40.541666 22 39 22 z M 9 25 C 9.791666 25 10.195482 25.242867 10.503906 25.589844 C 10.81233 25.936821 11 26.458333 11 27 C 11 27.541667 10.81233 28.063179 10.503906 28.410156 C 10.195482 28.757133 9.791666 29 9 29 C 8.208334 29 7.8045177 28.757133 7.4960938 28.410156 C 7.1876698 28.063179 7 27.541667 7 27 C 7 26.458333 7.1876698 25.936821 7.4960938 25.589844 C 7.8045177 25.242867 8.208334 25 9 25 z M 39 25 C 39.791666 25 40.195482 25.242867 40.503906 25.589844 C 40.81233 25.936821 41 26.458333 41 27 C 41 27.541667 40.81233 28.063179 40.503906 28.410156 C 40.195482 28.757133 39.791666 29 39 29 C 38.208334 29 37.804518 28.757133 37.496094 28.410156 C 37.18767 28.063179 37 27.541667 37 27 C 37 26.458333 37.18767 25.936821 37.496094 25.589844 C 37.804518 25.242867 38.208334 25 39 25 z M 18.052734 28 C 16.384766 28 15 29.384766 15 31.052734 L 15 34.021484 C 14.979733 34.021074 14.96762 34 14.947266 34 L 3.0527344 34 C 1.3847659 34 -2.9605947e-16 35.384766 0 37.052734 L 0 38.949219 C 0 40.778128 1.1549049 42.35297 2.7695312 43.382812 C 4.3841576 44.412656 6.526281 45.001953 9 45.001953 C 11.473607 45.001953 13.613818 44.412548 15.228516 43.382812 C 15.743751 43.054234 16.100843 42.590377 16.5 42.160156 C 16.898941 42.589937 17.25472 43.054455 17.769531 43.382812 C 19.384158 44.412656 21.526281 45.001953 24 45.001953 C 26.473607 45.001953 28.613818 44.412548 30.228516 43.382812 C 30.743751 43.054234 31.100843 42.590377 31.5 42.160156 C 31.898941 42.589937 32.25472 43.054455 32.769531 43.382812 C 34.384158 44.412656 36.526281 45.001953 39 45.001953 C 41.473607 45.001953 43.613818 44.412548 45.228516 43.382812 C 46.843213 42.353077 48 40.77836 48 38.949219 L 48 37.052734 C 48 35.384766 46.615234 34 44.947266 34 L 33.052734 34 C 33.032384 34 33.02026 34.021074 33 34.021484 L 33 31.052734 C 32.999996 29.38477 31.615234 28 29.947266 28 L 18.052734 28 z M 18.052734 31 L 29.947266 31 C 29.993297 31 30 31.006703 30 31.052734 L 30 37.052734 L 30 38.949219 C 30 39.503077 29.637239 40.203001 28.617188 40.853516 C 27.597135 41.50403 25.987393 42.001953 24 42.001953 C 22.012719 42.001953 20.402936 41.504172 19.382812 40.853516 C 18.362689 40.202859 18 39.502309 18 38.949219 L 18 37.052734 L 18 31.052734 C 18 31.006703 18.006703 31 18.052734 31 z M 3.0527344 37 L 14.947266 37 C 14.993297 37 15 37.006703 15 37.052734 L 15 38.949219 C 15 39.503077 14.637239 40.203001 13.617188 40.853516 C 12.597134 41.50403 10.987393 42.001953 9 42.001953 C 7.012719 42.001953 5.4029362 41.504172 4.3828125 40.853516 C 3.3626888 40.202859 3 39.502309 3 38.949219 L 3 37.052734 C 3 37.006703 3.0067029 37 3.0527344 37 z M 33.052734 37 L 44.947266 37 C 44.993297 37 45 37.006703 45 37.052734 L 45 38.949219 C 45 39.503077 44.637239 40.203001 43.617188 40.853516 C 42.597135 41.50403 40.987393 42.001953 39 42.001953 C 37.012719 42.001953 35.402936 41.504172 34.382812 40.853516 C 33.36269 40.202859 33 39.502309 33 38.949219 L 33 37.052734 C 33 37.006703 33.006703 37 33.052734 37 z"></path>
                    </svg>
                    <p class="ml-2">Masterlist of Applicants</p>
                </a>

                <div x-data="{ isApplicationsOpen: false }">
                    <!-- Applications Menu -->
                    <a href="#" @click="isApplicationsOpen = !isApplicationsOpen; activeLink = 'applications'; localStorage.setItem('activeLink', 'applications')"
                       :class="{ 'bg-[#D9D9D9] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'applications' }"
                       class="mx-2 flex items-center justify-between py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">
                                <path d=""></path>
                            </svg>
                            <p class="ml-2">Applications</p>
                        </div>
                        <svg :class="{ 'transform rotate-180': isApplicationsOpen }"
                             class="w-4 h-4 transition-transform duration-200"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>

                    <!-- Applications Submenus -->
                    <div x-show="isApplicationsOpen" x-transition class="ml-4">
                        <!-- Applicants -->
                        <a href="{{ route('applicants') }}"
                           @click="activeChildLink = 'admin-applicants'; localStorage.setItem('activeChildLink', 'admin-applicants')"
                           :class="{ 'text-[#FF9100] font-bold': activeChildLink === 'admin-applicants' }"
                           class="flex items-center py-2 px-4 hover:text-[#FF9100]">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">
                                <path d="M 12.5 4 C 10.02 4 8 6.02 8 8.5 L 8 39.5 C 8 41.98 10.02 44 12.5 44 L 26.539062 44 C 26.189063 43.4 26 42.73 26 42 L 26 41 L 12.5 41 C 11.67 41 11 40.33 11 39.5 L 11 8.5 C 11 7.67 11.67 7 12.5 7 L 35.5 7 C 36.33 7 37 7.67 37 8.5 L 37 24 C 38.01 24 39.02 24.070938 40 24.210938 L 40 8.5 C 40 6.02 37.98 4 35.5 4 L 12.5 4 z M 24 10 A 3.5 3.5 0 1 0 24 17 A 3.5 3.5 0 1 0 24 10 z M 19.5 19 C 18.672 19 18 19.672 18 20.5 L 18 21.5 C 18 23.433 20.686 25 24 25 C 27.314 25 30 23.433 30 21.5 L 30 20.5 C 30 19.672 29.328 19 28.5 19 L 19.5 19 z M 37 26 C 32.029 26 28 27.791 28 30 C 28 32.209 32.029 34 37 34 C 41.971 34 46 32.209 46 30 C 46 27.791 41.971 26 37 26 z M 16.5 28 C 15.67 28 15 28.67 15 29.5 C 15 30.33 15.67 31 16.5 31 L 26 31 L 26 30 C 26 29.27 26.189063 28.6 26.539062 28 L 16.5 28 z M 28 33 L 28 36 C 28 38.21 32.03 40 37 40 C 41.97 40 46 38.21 46 36 L 46 33 C 46 35.21 41.97 37 37 37 C 32.03 37 28 35.21 28 33 z M 16.5 34 C 15.67 34 15 34.67 15 35.5 C 15 36.33 15.67 37 16.5 37 L 26 37 L 26 34 L 16.5 34 z M 28 39 L 28 42 C 28 44.21 32.03 46 37 46 C 41.97 46 46 44.21 46 42 L 46 39 C 46 41.21 41.97 43 37 43 C 32.03 43 28 41.21 28 39 z"></path>
                            </svg>
                            <span class="ml-2">Applicants</span>
                        </a>

                        <!-- Tagged/Validated -->
                        <a href="{{ route('transaction-request') }}"
                           @click="activeChildLink = 'admin-transactions-request'; localStorage.setItem('activeChildLink', 'admin-transactions-request')"
                           :class="{ 'text-[#FF9100] font-bold': activeChildLink === 'admin-transactions-request' }"
                           class="flex items-center py-2 px-4 hover:text-[#FF9100]">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">
                                <path d="M 24 5.0273438 C 22.851301 5.0273438 21.70304 5.4009945 20.753906 6.1484375 A 1.50015 1.50015 0 0 0 20.658203 6.2304688 L 4.5546875 21.255859 C 2.8485365 22.847233 2.8013499 25.586506 4.4511719 27.236328 C 6.036957 28.822113 8.6399476 28.853448 10.261719 27.304688 A 1.50015 1.50015 0 0 0 10.265625 27.300781 L 24.003906 14.085938 L 37.734375 27.298828 A 1.50015 1.50015 0 0 0 37.738281 27.302734 C 39.359795 28.852802 41.963043 28.824063 43.548828 27.238281 C 45.19865 25.588459 45.151465 22.849186 43.445312 21.257812 L 27.341797 6.2304688 A 1.50015 1.50015 0 0 0 27.246094 6.1484375 C 26.296957 5.4009942 25.148699 5.0273438 24 5.0273438 z M 24 8.0195312 C 24.485694 8.0195312 24.970178 8.1837987 25.378906 8.5019531 L 41.400391 23.451172 C 41.89424 23.911798 41.905915 24.63901 41.427734 25.117188 C 40.971519 25.573401 40.277033 25.580696 39.810547 25.134766 L 25.044922 10.923828 A 1.50015 1.50015 0 0 0 22.964844 10.923828 L 8.1894531 25.134766 C 7.723224 25.580006 7.0284805 25.571449 6.5722656 25.115234 C 6.0940876 24.637056 6.1057604 23.909845 6.5996094 23.449219 L 22.621094 8.5019531 C 23.029822 8.1837987 23.514306 8.0195312 24 8.0195312 z"></path>
                            </svg>
                            <span class="ml-2">Tagged/Validated</span>
                        </a>

                        <!-- Awardee List -->
                        <a href="{{ route('awardee-list') }}"
                           @click="activeChildLink = 'awardee'; localStorage.setItem('activeChildLink', 'awardee')"
                           :class="{ 'text-[#FF9100] font-bold': activeChildLink === 'awardee' }"
                           class="flex items-center py-2 px-4 hover:text-[#FF9100]">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">
                                <path d="M 21 4 C 15.494917 4 11 8.494921 11 14 C 11 19.505079 15.494917 24 21 24 C 26.505083 24 31 19.505079 31 14 C 31 8.494921 26.505083 4 21 4 z M 21 7 C 24.883764 7 28 10.116238 28 14 C 28 17.883762 24.883764 21 21 21 C 17.116236 21 14 17.883762 14 14 C 14 10.116238 17.116236 7 21 7 z M 35 24 C 28.925 24 24 28.925 24 35 C 24 41.075 28.925 46 35 46 C 41.075 46 46 41.075 46 35 C 46 28.925 41.075 24 35 24 z M 9.5 28 C 7.02 28 5 30.02 5 32.5 L 5 33.699219 C 5 39.479219 12.03 44 21 44 C 22.49 44 23.929062 43.870859 25.289062 43.630859 C 24.549063 42.800859 23.910391 41.880859 23.400391 40.880859 C 22.630391 40.960859 21.83 41 21 41 C 12.97 41 8 37.209219 8 33.699219 L 8 32.5 C 8 31.67 8.67 31 9.5 31 L 22.630859 31 C 22.970859 29.93 23.450781 28.93 24.050781 28 L 9.5 28 z"></path>
                            </svg>
                            <span class="ml-2">Awardee List</span>
                        </a>
                    </div>
                </div>


{{--                <a href="{{ route('applicants') }}" @click="activeLink = 'admin-applicants'; activeChildLink = ''; localStorage.setItem('activeLink', 'admin-applicants'); localStorage.setItem('activeChildLink', '')" :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'admin-applicants' }" class="mx-2 flex items-center  py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[12px] hover:text-[#FF9100]">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{--                        <path d="M 12.5 4 C 10.02 4 8 6.02 8 8.5 L 8 39.5 C 8 41.98 10.02 44 12.5 44 L 26.539062 44 C 26.189063 43.4 26 42.73 26 42 L 26 41 L 12.5 41 C 11.67 41 11 40.33 11 39.5 L 11 8.5 C 11 7.67 11.67 7 12.5 7 L 35.5 7 C 36.33 7 37 7.67 37 8.5 L 37 24 C 38.01 24 39.02 24.070938 40 24.210938 L 40 8.5 C 40 6.02 37.98 4 35.5 4 L 12.5 4 z M 24 10 A 3.5 3.5 0 1 0 24 17 A 3.5 3.5 0 1 0 24 10 z M 19.5 19 C 18.672 19 18 19.672 18 20.5 L 18 21.5 C 18 23.433 20.686 25 24 25 C 27.314 25 30 23.433 30 21.5 L 30 20.5 C 30 19.672 29.328 19 28.5 19 L 19.5 19 z M 37 26 C 32.029 26 28 27.791 28 30 C 28 32.209 32.029 34 37 34 C 41.971 34 46 32.209 46 30 C 46 27.791 41.971 26 37 26 z M 16.5 28 C 15.67 28 15 28.67 15 29.5 C 15 30.33 15.67 31 16.5 31 L 26 31 L 26 30 C 26 29.27 26.189063 28.6 26.539062 28 L 16.5 28 z M 28 33 L 28 36 C 28 38.21 32.03 40 37 40 C 41.97 40 46 38.21 46 36 L 46 33 C 46 35.21 41.97 37 37 37 C 32.03 37 28 35.21 28 33 z M 16.5 34 C 15.67 34 15 34.67 15 35.5 C 15 36.33 15.67 37 16.5 37 L 26 37 L 26 34 L 16.5 34 z M 28 39 L 28 42 C 28 44.21 32.03 46 37 46 C 41.97 46 46 44.21 46 42 L 46 39 C 46 41.21 41.97 43 37 43 C 32.03 43 28 41.21 28 39 z"></path>--}}
{{--                    </svg>--}}
{{--                    <p class="ml-2">Applicants</p>--}}
{{--                </a>--}}

{{--                <a href="{{ route('transaction-request') }}" @click="activeLink = 'admin-transactions-request'; activeChildLink = ''; localStorage.setItem('activeLink', 'admin-transactions-request'); localStorage.setItem('activeChildLink', '')" :class="{ 'bg-[rgb(217,217,217)] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'admin-transactions-request' }" class="mx-2 flex items-center text-[12px] py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[12px] hover:text-[#FF9100] ">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{--                        <path d="M 24 5.0273438 C 22.851301 5.0273438 21.70304 5.4009945 20.753906 6.1484375 A 1.50015 1.50015 0 0 0 20.658203 6.2304688 L 4.5546875 21.255859 C 2.8485365 22.847233 2.8013499 25.586506 4.4511719 27.236328 C 6.036957 28.822113 8.6399476 28.853448 10.261719 27.304688 A 1.50015 1.50015 0 0 0 10.265625 27.300781 L 24.003906 14.085938 L 37.734375 27.298828 A 1.50015 1.50015 0 0 0 37.738281 27.302734 C 39.359795 28.852802 41.963043 28.824063 43.548828 27.238281 C 45.19865 25.588459 45.151465 22.849186 43.445312 21.257812 L 27.341797 6.2304688 A 1.50015 1.50015 0 0 0 27.246094 6.1484375 C 26.296957 5.4009942 25.148699 5.0273438 24 5.0273438 z M 24 8.0195312 C 24.485694 8.0195312 24.970178 8.1837987 25.378906 8.5019531 L 41.400391 23.451172 C 41.89424 23.911798 41.905915 24.63901 41.427734 25.117188 C 40.971519 25.573401 40.277033 25.580696 39.810547 25.134766 L 25.044922 10.923828 A 1.50015 1.50015 0 0 0 22.964844 10.923828 L 8.1894531 25.134766 C 7.723224 25.580006 7.0284805 25.571449 6.5722656 25.115234 C 6.0940876 24.637056 6.1057604 23.909845 6.5996094 23.449219 L 22.621094 8.5019531 C 23.029822 8.1837987 23.514306 8.0195312 24 8.0195312 z M 7.4765625 30.978516 A 1.50015 1.50015 0 0 0 6 32.5 L 6 33.5 A 1.50015 1.50015 0 1 0 9 33.5 L 9 32.5 A 1.50015 1.50015 0 0 0 7.4765625 30.978516 z M 40.476562 30.978516 A 1.50015 1.50015 0 0 0 39 32.5 L 39 33.5 A 1.50015 1.50015 0 1 0 42 33.5 L 42 32.5 A 1.50015 1.50015 0 0 0 40.476562 30.978516 z M 40.322266 38.175781 L 39.222656 38.851562 L 38.990234 39.515625 L 38.980469 39.607422 L 38.955078 39.693359 L 38.908203 39.777344 L 38.849609 39.849609 L 38.777344 39.908203 L 38.666016 39.96875 L 37.90625 41.013672 L 38.238281 42.259766 L 39.417969 42.787109 L 40.095703 42.605469 L 40.333984 42.476562 L 40.572266 42.316406 L 40.869141 42.072266 L 41.072266 41.869141 L 41.316406 41.572266 L 41.476562 41.333984 L 41.662109 40.994141 L 41.775391 40.722656 L 41.892578 40.347656 L 41.951172 40.052734 L 41.976562 39.816406 L 41.539062 38.601562 L 40.322266 38.175781 z M 6.9433594 38.275391 L 6.0722656 39.228516 L 6.03125 39.929688 L 6.0976562 40.302734 L 6.1738281 40.576172 L 6.3046875 40.921875 L 6.4277344 41.171875 L 6.6191406 41.482422 L 6.7832031 41.701172 L 7.0273438 41.972656 L 7.2265625 42.15625 L 7.515625 42.378906 L 7.7480469 42.525391 L 7.9355469 42.621094 L 9.2246094 42.658203 L 10.066406 41.677734 L 9.8339844 40.408203 L 9.3007812 39.951172 L 9.2382812 39.919922 L 9.1621094 39.861328 L 9.1054688 39.798828 L 9.0566406 39.71875 L 9.0273438 39.638672 L 8.984375 39.402344 L 8.2324219 38.353516 L 6.9433594 38.275391 z M 14.75 40 L 13.583984 40.554688 L 13.283203 41.810547 L 14.066406 42.835938 L 14.75 43 L 16.804688 43 L 17.970703 42.445312 L 18.273438 41.189453 L 17.488281 40.164062 L 16.804688 40 L 14.75 40 z M 22.970703 40 L 21.806641 40.554688 L 21.503906 41.810547 L 22.289062 42.835938 L 22.970703 43 L 25.027344 43 L 26.191406 42.445312 L 26.494141 41.189453 L 25.710938 40.164062 L 25.027344 40 L 22.970703 40 z M 31.193359 40 L 30.027344 40.554688 L 29.726562 41.810547 L 30.509766 42.835938 L 31.193359 43 L 33.248047 43 L 34.414062 42.445312 L 34.716797 41.189453 L 33.931641 40.164062 L 33.248047 40 L 31.193359 40 z"></path>--}}
{{--                    </svg>--}}
{{--                    <p class="ml-2">Tagged/Validated</p>--}}
{{--                </a>--}}


{{--                <a href="{{ route('awardee-list') }}" @click="activeLink = 'awardee'; activeChildLink = ''; localStorage.setItem('activeLink', 'awardee'); localStorage.setItem('activeChildLink', '')" :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'awardee' }" class="mx-2 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{--                        <path d="M 21 4 C 15.494917 4 11 8.494921 11 14 C 11 19.505079 15.494917 24 21 24 C 26.505083 24 31 19.505079 31 14 C 31 8.494921 26.505083 4 21 4 z M 21 7 C 24.883764 7 28 10.116238 28 14 C 28 17.883762 24.883764 21 21 21 C 17.116236 21 14 17.883762 14 14 C 14 10.116238 17.116236 7 21 7 z M 35 24 C 28.925 24 24 28.925 24 35 C 24 41.075 28.925 46 35 46 C 41.075 46 46 41.075 46 35 C 46 28.925 41.075 24 35 24 z M 9.5 28 C 7.02 28 5 30.02 5 32.5 L 5 33.699219 C 5 39.479219 12.03 44 21 44 C 22.49 44 23.929062 43.870859 25.289062 43.630859 C 24.549063 42.800859 23.910391 41.880859 23.400391 40.880859 C 22.630391 40.960859 21.83 41 21 41 C 12.97 41 8 37.209219 8 33.699219 L 8 32.5 C 8 31.67 8.67 31 9.5 31 L 22.630859 31 C 22.970859 29.93 23.450781 28.93 24.050781 28 L 9.5 28 z M 35 28 C 35.48 28 35.908453 28.305766 36.064453 28.759766 L 37.177734 32 L 40.875 32 C 41.358 32 41.787406 32.308625 41.941406 32.765625 C 42.095406 33.223625 41.939687 33.729484 41.554688 34.021484 L 38.560547 36.292969 L 39.574219 39.539062 C 39.720219 40.005063 39.548391 40.510969 39.150391 40.792969 C 38.955391 40.930969 38.727 41 38.5 41 C 38.263 41 38.025172 40.925391 37.826172 40.775391 L 35 38.660156 L 32.173828 40.775391 C 31.783828 41.068391 31.248609 41.076922 30.849609 40.794922 C 30.451609 40.512922 30.279781 40.005063 30.425781 39.539062 L 31.439453 36.294922 L 28.445312 34.021484 C 28.060312 33.729484 27.904594 33.225578 28.058594 32.767578 C 28.213594 32.309578 28.642 32 29.125 32 L 32.822266 32 L 33.935547 28.759766 C 34.091547 28.305766 34.52 28 35 28 z"></path>--}}
{{--                    </svg>--}}
{{--                    <p class="ml-2">Awardee List</p>--}}
{{--                </a>--}}
{{--                <a href="{{ route('transfer-histories') }}" @click="activeLink = 'transfer'; activeChildLink = ''; localStorage.setItem('activeLink', 'transfer'); localStorage.setItem('activeChildLink', '')" :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'transfer' }" class="mx-2 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{--                        <path d="M 21 4 C 15.494917 4 11 8.494921 11 14 C 11 19.505079 15.494917 24 21 24 C 26.505083 24 31 19.505079 31 14 C 31 8.494921 26.505083 4 21 4 z M 21 7 C 24.883764 7 28 10.116238 28 14 C 28 17.883762 24.883764 21 21 21 C 17.116236 21 14 17.883762 14 14 C 14 10.116238 17.116236 7 21 7 z M 35 24 C 28.925 24 24 28.925 24 35 C 24 41.075 28.925 46 35 46 C 41.075 46 46 41.075 46 35 C 46 28.925 41.075 24 35 24 z M 9.5 28 C 7.02 28 5 30.02 5 32.5 L 5 33.699219 C 5 39.479219 12.03 44 21 44 C 22.49 44 23.929062 43.870859 25.289062 43.630859 C 24.549063 42.800859 23.910391 41.880859 23.400391 40.880859 C 22.630391 40.960859 21.83 41 21 41 C 12.97 41 8 37.209219 8 33.699219 L 8 32.5 C 8 31.67 8.67 31 9.5 31 L 22.630859 31 C 22.970859 29.93 23.450781 28.93 24.050781 28 L 9.5 28 z M 35 28 C 35.48 28 35.908453 28.305766 36.064453 28.759766 L 37.177734 32 L 40.875 32 C 41.358 32 41.787406 32.308625 41.941406 32.765625 C 42.095406 33.223625 41.939687 33.729484 41.554688 34.021484 L 38.560547 36.292969 L 39.574219 39.539062 C 39.720219 40.005063 39.548391 40.510969 39.150391 40.792969 C 38.955391 40.930969 38.727 41 38.5 41 C 38.263 41 38.025172 40.925391 37.826172 40.775391 L 35 38.660156 L 32.173828 40.775391 C 31.783828 41.068391 31.248609 41.076922 30.849609 40.794922 C 30.451609 40.512922 30.279781 40.005063 30.425781 39.539062 L 31.439453 36.294922 L 28.445312 34.021484 C 28.060312 33.729484 27.904594 33.225578 28.058594 32.767578 C 28.213594 32.309578 28.642 32 29.125 32 L 32.822266 32 L 33.935547 28.759766 C 34.091547 28.305766 34.52 28 35 28 z"></path>--}}
{{--                    </svg>--}}
{{--                    <p class="ml-2">Transfer Histories</p>--}}
{{--                </a>--}}
                <a href="{{ route('relocation-sites') }}" @click="activeLink = 'relocation'; activeChildLink = ''; localStorage.setItem('activeLink', 'relocation'); localStorage.setItem('activeChildLink', '')" :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'relocation' }" class="mx-2 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">
                        <path d="M 24 4 C 14.629252 4 7 11.629252 7 21 C 7 25.20679 8.5433056 29.064832 11.078125 32.03125 L 11.085938 32.039062 L 11.091797 32.046875 C 11.091797 32.046875 18.323729 40.299027 20.898438 42.755859 C 22.622568 44.39966 25.375478 44.39966 27.099609 42.755859 C 30.034388 39.956663 36.910156 32.042969 36.910156 32.042969 L 36.914062 32.037109 L 36.919922 32.03125 C 39.456988 29.064801 41 25.20679 41 21 C 41 11.629252 33.370748 4 24 4 z M 24 7 C 31.749252 7 38 13.250748 38 21 C 38 24.47521 36.733544 27.632586 34.638672 30.082031 C 34.625032 30.097631 27.590036 38.143501 25.029297 40.585938 C 24.435428 41.152136 23.562619 41.152136 22.96875 40.585938 C 20.828579 38.543748 13.381099 30.106639 13.359375 30.082031 L 13.357422 30.080078 C 11.265326 27.630829 10 24.474248 10 21 C 10 13.250748 16.250748 7 24 7 z M 24 15 C 22.125 15 20.528815 15.757133 19.503906 16.910156 C 18.478997 18.063179 18 19.541667 18 21 C 18 22.458333 18.478997 23.936821 19.503906 25.089844 C 20.528815 26.242867 22.125 27 24 27 C 25.875 27 27.471185 26.242867 28.496094 25.089844 C 29.521003 23.936821 30 22.458333 30 21 C 30 19.541667 29.521003 18.063179 28.496094 16.910156 C 27.471185 15.757133 25.875 15 24 15 z M 24 18 C 25.124999 18 25.778816 18.367867 26.253906 18.902344 C 26.728997 19.436821 27 20.208333 27 21 C 27 21.791667 26.728997 22.563179 26.253906 23.097656 C 25.778816 23.632133 25.124999 24 24 24 C 22.875001 24 22.221184 23.632133 21.746094 23.097656 C 21.271003 22.563179 21 21.791667 21 21 C 21 20.208333 21.271003 19.436821 21.746094 18.902344 C 22.221184 18.367867 22.875001 18 24 18 z"></path>
                    </svg>
                    <p class="ml-2">Relocation Sites</p>
                </a>
{{--                <a href="{{ route('blacklist') }}" @click="activeLink = 'blacklist'; activeChildLink = ''; localStorage.setItem('activeLink', 'blacklist'); localStorage.setItem('activeChildLink', '')" :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'blacklist' }" class="mx-2 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{--                        <path d="M 17 2 C 11.494917 2 7 6.494921 7 12 C 7 17.505079 11.494917 22 17 22 C 22.505083 22 27 17.505079 27 12 C 27 6.494921 22.505083 2 17 2 z M 17 5 C 20.883764 5 24 8.1162385 24 12 C 24 15.883762 20.883764 19 17 19 C 13.116236 19 10 15.883762 10 12 C 10 8.1162385 13.116236 5 17 5 z M 35 24 C 28.925 24 24 28.925 24 35 C 24 41.075 28.925 46 35 46 C 41.075 46 46 41.075 46 35 C 46 28.925 41.075 24 35 24 z M 6.2226562 26 C 4.1696563 26 2.5 27.784516 2.5 29.978516 L 2.5 31.5 C 2.5 34.781 4.1953906 37.632344 7.2753906 39.527344 C 9.8663906 41.122344 13.32 42 17 42 C 19.19 42 21.431516 41.675766 23.478516 41.009766 C 23.018516 40.128766 22.664062 39.186172 22.414062 38.201172 C 20.717062 38.735172 18.837 39 17 39 C 11.461 39 5.5 36.653 5.5 31.5 L 5.5 29.978516 C 5.5 29.447516 5.8306562 29 6.2226562 29 L 23.474609 29 C 24.049609 27.897 24.778812 26.889 25.632812 26 L 6.2226562 26 z M 30 29 C 30.25575 29 30.511531 29.097469 30.707031 29.292969 L 35 33.585938 L 39.292969 29.292969 C 39.683969 28.901969 40.316031 28.901969 40.707031 29.292969 C 41.098031 29.683969 41.098031 30.316031 40.707031 30.707031 L 36.414062 35 L 40.707031 39.292969 C 41.098031 39.683969 41.098031 40.316031 40.707031 40.707031 C 40.512031 40.902031 40.256 41 40 41 C 39.744 41 39.487969 40.902031 39.292969 40.707031 L 35 36.414062 L 30.707031 40.707031 C 30.512031 40.902031 30.256 41 30 41 C 29.744 41 29.487969 40.902031 29.292969 40.707031 C 28.901969 40.316031 28.901969 39.683969 29.292969 39.292969 L 33.585938 35 L 29.292969 30.707031 C 28.901969 30.316031 28.901969 29.683969 29.292969 29.292969 C 29.488469 29.097469 29.74425 29 30 29 z"></path>--}}
{{--                    </svg>--}}
{{--                    <p class="ml-2">Blacklist</p>--}}
{{--                </a>--}}
{{--                <a href="{{ route('reports-summary-informal-settlers') }}" @click="activeLink = 'reports'; activeChildLink = ''; localStorage.setItem('activeLink', 'reports'); localStorage.setItem('activeChildLink', '')" :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'reports' }" class="mx-2 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{--                        <path d="M 12.5 4 C 10.02 4 8 6.02 8 8.5 L 8 39.5 C 8 41.98 10.02 44 12.5 44 L 35.5 44 C 37.981 44 40 41.981 40 39.5 L 40 18.5 C 40 18.085 39.831797 17.710703 39.560547 17.439453 L 26.560547 4.4394531 C 26.289297 4.1682031 25.915 4 25.5 4 L 12.5 4 z M 12.5 7 L 24 7 L 24 15.5 C 24 17.98 26.02 20 28.5 20 L 37 20 L 37 39.5 C 37 40.327 36.327 41 35.5 41 L 12.5 41 C 11.67 41 11 40.33 11 39.5 L 11 8.5 C 11 7.67 11.67 7 12.5 7 z M 27 9.1210938 L 34.878906 17 L 28.5 17 C 27.67 17 27 16.33 27 15.5 L 27 9.1210938 z M 32 25 A 2 2 0 0 0 30.005859 26.873047 L 26 30.878906 L 22.994141 27.873047 A 2 2 0 0 0 21 26 A 2 2 0 0 0 19.005859 27.873047 L 15.873047 31.005859 A 2 2 0 0 0 16 35 A 2 2 0 0 0 17.994141 33.126953 L 21 30.121094 L 24.005859 33.126953 A 2 2 0 0 0 26 35 A 2 2 0 0 0 27.994141 33.126953 L 32.126953 28.994141 A 2 2 0 0 0 32 25 z"></path>--}}
{{--                    </svg>--}}
{{--                    <p class="ml-2">Reports</p>--}}
{{--                </a>--}}
                <div x-data="{
                            activeLink: localStorage.getItem('activeLink') || '',
                            activeChildLink: localStorage.getItem('activeChildLink') || '',
                            isReportsSubmenuOpen: false,
                            toggleReportsSubmenu() {
                              this.isReportsSubmenuOpen = !this.isReportsSubmenuOpen;
                              this.activeLink = this.activeLink === 'reports' ? '' : 'reports';
                              localStorage.setItem('activeLink', this.activeLink);
                            },
                            setActiveLinks(childLink) {
                              this.activeLink = 'reports';
                              this.activeChildLink = childLink;
                              localStorage.setItem('activeLink', 'reports');
                              localStorage.setItem('activeChildLink', childLink);
                            }
                        }">
                    <!-- Parent Reports Link -->
                    <a href="#"
                        @click.prevent="toggleReportsSubmenu()"
                        :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'reports' }"
                        class="mx-2 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">
                            <path d="M 12.5 4 C 10.02 4 8 6.02 8 8.5 L 8 39.5 C 8 41.98 10.02 44 12.5 44 L 35.5 44 C 37.981 44 40 41.981 40 39.5 L 40 18.5 C 40 18.085 39.831797 17.710703 39.560547 17.439453 L 26.560547 4.4394531 C 26.289297 4.1682031 25.915 4 25.5 4 L 12.5 4 z M 12.5 7 L 24 7 L 24 15.5 C 24 17.98 26.02 20 28.5 20 L 37 20 L 37 39.5 C 37 40.327 36.327 41 35.5 41 L 12.5 41 C 11.67 41 11 40.33 11 39.5 L 11 8.5 C 11 7.67 11.67 7 12.5 7 z M 27 9.1210938 L 34.878906 17 L 28.5 17 C 27.67 17 27 16.33 27 15.5 L 27 9.1210938 z M 32 25 A 2 2 0 0 0 30.005859 26.873047 L 26 30.878906 L 22.994141 27.873047 A 2 2 0 0 0 21 26 A 2 2 0 0 0 19.005859 27.873047 L 15.873047 31.005859 A 2 2 0 0 0 16 35 A 2 2 0 0 0 17.994141 33.126953 L 21 30.121094 L 24.005859 33.126953 A 2 2 0 0 0 26 35 A 2 2 0 0 0 27.994141 33.126953 L 32.126953 28.994141 A 2 2 0 0 0 32 25 z"></path>
                        </svg>
                        <p class="ml-2">Reports</p>
                    </a>

                    <!-- Submenu -->
                    <div x-show="isReportsSubmenuOpen"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="pl-10">

                        <!-- Transfer Histories -->
                        <a href="{{ route('transfer-histories') }}"
                           @click="setActiveLinks('transfer-histories')"
                           :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeChildLink === 'transfer-histories' }"
                           class="block py-2 px-4 text-sm hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">
                            Transfer Histories
                        </a>

                        <!-- Blacklist Submenu Item -->
                        <a href="{{ route('blacklist') }}"
                            @click="setActiveLinks('blacklist')"
                            :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeChildLink === 'blacklist' }"
                            class="block py-2 px-4 text-sm hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">
                            Blacklist
                        </a>

                        <!-- Summary of Identified Informal Settlers Submenu Item -->
                        <a href="{{ route('summary-of-identified-informal-settlers') }}"
                            @click="setActiveLinks('summary-of-identified-informal-settlers')"
                            :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeChildLink === 'summary-of-identified-informal-settlers' }"
                            class="block py-2 px-4 text-sm hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">
                            Summary of Identified Informal Settlers
                        </a>

                        <!-- Summary of Relocation Lot Applicant Submenu Item -->
                        <a href="{{ route('summary-of-relocation-lot-applicants') }}"
                            @click="setActiveLinks('summary-of-relocation-lot-applicants')"
                            :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeChildLink === 'summary-of-relocation-lot-applicants' }"
                            class="block py-2 px-4 text-sm hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">
                            Summary of Relocation Lot Applicants
                        </a>
                    </div>
                </div>

                <a href="{{ route('activity-logs') }}" @click="activeLink = 'activity'; activeChildLink = ''; localStorage.setItem('activeLink', 'activity'); localStorage.setItem('activeChildLink', '')" :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'activity' }" class="mx-2 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">
                        <path d="M 12.5 5 C 10.019 5 8 7.019 8 9.5 L 8 33 L 6.5 33 C 5.672 33 5 33.671 5 34.5 L 5 36.5 C 5 40.084 7.916 43 11.5 43 L 25.474609 43 C 24.985609 42.062 24.611328 41.055 24.361328 40 L 11.5 40 C 9.57 40 8 38.43 8 36.5 L 8 36 L 24.050781 36 C 24.129781 34.961 24.325766 33.956 24.634766 33 L 11 33 L 11 9.5 C 11 8.673 11.673 8 12.5 8 L 35.5 8 C 36.327 8 37 8.673 37 9.5 L 37 24 C 38.034 24 39.035 24.133328 40 24.361328 L 40 9.5 C 40 7.019 37.981 5 35.5 5 L 12.5 5 z M 16.5 13 A 1.5 1.5 0 0 0 16.5 16 A 1.5 1.5 0 0 0 16.5 13 z M 21.5 13 A 1.50015 1.50015 0 1 0 21.5 16 L 31.5 16 A 1.50015 1.50015 0 1 0 31.5 13 L 21.5 13 z M 16.5 19 A 1.5 1.5 0 0 0 16.5 22 A 1.5 1.5 0 0 0 16.5 19 z M 21.5 19 A 1.50015 1.50015 0 1 0 21.5 22 L 31.5 22 A 1.50015 1.50015 0 1 0 31.5 19 L 21.5 19 z M 16.5 25 A 1.5 1.5 0 0 0 16.5 28 A 1.5 1.5 0 0 0 16.5 25 z M 21.5 25 C 20.672 25 20 25.671 20 26.5 C 20 27.329 20.672 28 21.5 28 L 27.632812 28 C 28.828813 26.755 30.266 25.743734 31.875 25.052734 C 31.754 25.021734 31.63 25 31.5 25 L 21.5 25 z M 37 26 C 30.925 26 26 30.925 26 37 C 26 43.075 30.925 48 37 48 C 43.075 48 48 43.075 48 37 C 48 30.925 43.075 26 37 26 z M 33 30 L 41 30 C 41.553 30 42 30.448 42 31 C 42 31.552 41.553 32 41 32 L 41 34 C 41 35.2 40.457187 36.266 39.617188 37 C 40.457188 37.734 41 38.8 41 40 L 41 42 C 41.553 42 42 42.448 42 43 C 42 43.552 41.553 44 41 44 L 40 44 L 34 44 L 33 44 C 32.447 44 32 43.552 32 43 C 32 42.448 32.447 42 33 42 L 33 40 C 33 38.8 33.542813 37.734 34.382812 37 C 33.542812 36.266 33 35.2 33 34 L 33 32 C 32.447 32 32 31.552 32 31 C 32 30.448 32.447 30 33 30 z M 35 32 L 35 34 L 39 34 L 39 32 L 35 32 z M 37 38 C 35.897 38 35 38.897 35 40 L 35 41.611328 L 36.683594 41.050781 C 36.888594 40.982781 37.111406 40.982781 37.316406 41.050781 L 39 41.611328 L 39 40 C 39 38.897 38.103 38 37 38 z"></path>
                    </svg>
                    <p class="ml-2">Activity Logs</p>
                </a>
                <a href="{{ route('system-configuration') }}" @click="activeLink = 'settings'; activeChildLink = ''; localStorage.setItem('activeLink', 'settings'); localStorage.setItem('activeChildLink', '')" :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'settings' }" class="ml-2 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">
                        <path d="M 10 6 A 4 4 0 0 0 6 10 L 6 38 A 4 4 0 0 0 10 42 L 38 42 A 4 4 0 0 0 42 38 L 42 10 A 4 4 0 0 0 38 6 L 10 6 z M 10 9 L 38 9 A 1 1 0 0 1 39 10 L 39 38 A 1 1 0 0 1 38 39 L 10 39 A 1 1 0 0 1 9 38 L 9 10 A 1 1 0 0 1 10 9 z M 23 13 A 2 2 0 0 0 21 15 L 21 15.410156 A 1.87 1.87 0 0 1 20 17.050781 L 20 17.099609 A 1.92 1.92 0 0 1 18.089844 17.099609 L 17.740234 16.890625 A 2 2 0 0 0 15 17.619141 L 14 19.359375 A 2 2 0 0 0 14.740234 22.089844 L 15.119141 22.310547 A 1.91 1.91 0 0 1 16.119141 23.980469 A 1.91 1.91 0 0 1 15.119141 25.650391 L 14.740234 25.869141 A 2 2 0 0 0 14 28.630859 L 15 30.369141 A 2 2 0 0 0 17.740234 31.099609 L 18.089844 30.890625 A 1.92 1.92 0 0 1 20 30.890625 L 20 31 A 1.87 1.87 0 0 1 21 32.640625 L 21 33 A 2 2 0 0 0 23 35 L 25 35 A 2 2 0 0 0 27 33 L 27 32.589844 A 1.87 1.87 0 0 1 28 31 L 28 30.900391 A 1.92 1.92 0 0 1 29.910156 30.900391 L 30.259766 31.109375 A 2 2 0 0 0 33 30.369141 L 34 28.630859 A 2 2 0 0 0 33.289062 25.900391 L 32.910156 25.679688 A 1.91 1.91 0 0 1 32 24 A 1.91 1.91 0 0 1 33 22.330078 L 33.380859 22.109375 A 2 2 0 0 0 34 19.369141 L 33 17.630859 A 2 2 0 0 0 30.259766 16.900391 L 29.910156 17.109375 A 1.92 1.92 0 0 1 28 17.109375 L 28 17.050781 A 1.87 1.87 0 0 1 27 15.410156 L 27 15 A 2 2 0 0 0 25 13 L 23 13 z M 23.875 21.001953 A 3 3 0 0 1 27 24 A 3 3 0 0 1 24 27 A 3 3 0 0 1 23.875 21.001953 z"></path>
                    </svg>
                    <p class="ml-2">System Configuration</p>
                </a>
            </nav>
        </aside>
    </div>
</div>

{{--<div class="bg-none shadow-md font-poppins text-black 0 p-0 " x-data="{ open: false, activeLink: localStorage.getItem('activeLink') || '', activeChildLink: localStorage.getItem('activeChildLink') || '' }">--}}
{{-- <div class="flex h-[100vh]">--}}
{{-- <!-- Sidebar -->--}}
{{-- <div @click.away="open = false" class="border-2 sticky top-0 flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark-mode:text-gray-200 dark-mode:bg-gray-800" x-data="{ open: false }">--}}
{{-- <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">--}}
{{-- <a href="{{ route('dashboard') }}" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"><x-application-sidebar-logo /></a>--}}
{{-- </div>--}}
{{-- <nav class="space-y-2 mt-15 flex-1 text-[13px] h-[calc(100vh-4rem)] overflow-auto scrollbar-hidden" x-data="{--}}
{{-- activeLink: localStorage.getItem('activeLink') || '',--}}
{{-- activeChildLink: localStorage.getItem('activeChildLink') || ''}">--}}
{{-- <a href="{{ route('dashboard') }}"--}}
{{-- @click="activeLink = 'dashboard'; activeChildLink = ''; localStorage.setItem('activeLink', 'dashboard'); localStorage.setItem('activeChildLink', '')"--}}
{{-- :class="{'bg-[#D9D9D9] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'dashboard'}"--}}
{{-- class="ml-4 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">--}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{-- <path d="M 10.5 6 C 8.0324991 6 6 8.0324991 6 10.5 L 6 13.5 C 6 15.967501 8.0324991 18 10.5 18 L 18.5 18 C 20.967501 18 23 15.967501 23 13.5 L 23 10.5 C 23 8.0324991 20.967501 6 18.5 6 L 10.5 6 z M 29.5 6 C 27.032499 6 25 8.0324991 25 10.5 L 25 23.5 C 25 25.967501 27.032499 28 29.5 28 L 37.5 28 C 39.967501 28 42 25.967501 42 23.5 L 42 10.5 C 42 8.0324991 39.967501 6 37.5 6 L 29.5 6 z M 10.5 9 L 18.5 9 C 19.346499 9 20 9.6535009 20 10.5 L 20 13.5 C 20 14.346499 19.346499 15 18.5 15 L 10.5 15 C 9.6535009 15 9 14.346499 9 13.5 L 9 10.5 C 9 9.6535009 9.6535009 9 10.5 9 z M 29.5 9 L 37.5 9 C 38.346499 9 39 9.6535009 39 10.5 L 39 23.5 C 39 24.346499 38.346499 25 37.5 25 L 29.5 25 C 28.653501 25 28 24.346499 28 23.5 L 28 10.5 C 28 9.6535009 28.653501 9 29.5 9 z M 10.5 20 C 8.0324991 20 6 22.032499 6 24.5 L 6 37.5 C 6 39.967501 8.0324991 42 10.5 42 L 18.5 42 C 20.967501 42 23 39.967501 23 37.5 L 23 24.5 C 23 22.032499 20.967501 20 18.5 20 L 10.5 20 z M 10.5 23 L 18.5 23 C 19.346499 23 20 23.653501 20 24.5 L 20 37.5 C 20 38.346499 19.346499 39 18.5 39 L 10.5 39 C 9.6535009 39 9 38.346499 9 37.5 L 9 24.5 C 9 23.653501 9.6535009 23 10.5 23 z M 29.5 30 C 27.032499 30 25 32.032499 25 34.5 L 25 37.5 C 25 39.967501 27.032499 42 29.5 42 L 37.5 42 C 39.967501 42 42 39.967501 42 37.5 L 42 34.5 C 42 32.032499 39.967501 30 37.5 30 L 29.5 30 z M 29.5 33 L 37.5 33 C 38.346499 33 39 33.653501 39 34.5 L 39 37.5 C 39 38.346499 38.346499 39 37.5 39 L 29.5 39 C 28.653501 39 28 38.346499 28 37.5 L 28 34.5 C 28 33.653501 28.653501 33 29.5 33 z"></path>--}}
{{-- </svg>--}}
{{-- <p class="ml-2">Dashboard</p>--}}
{{-- </a>--}}

{{-- <div class="relative" x-data="{ dropdownOpen: false, activeLink: localStorage.getItem('activeLink') || '', activeChildLink: localStorage.getItem('activeChildLink') || '' }" x-init="dropdownOpen = activeLink === 'client'">--}}
{{-- <a href="#"--}}
{{-- @click="dropdownOpen = !dropdownOpen; activeLink = 'client'; localStorage.setItem('activeLink', 'client')"--}}
{{-- :class="{'bg-[#D9D9D9] text-[12px] bg-opacity-40  text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'client' || activeChildLink.startsWith('client-') }"--}}
{{-- class="ml-4 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">--}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{-- <path d="M 9.5 6 C 7.5850452 6 6 7.5850452 6 9.5 L 6 16.5 C 6 18.414955 7.5850452 20 9.5 20 L 10 20 L 10 21.5 A 1.50015 1.50015 0 1 0 13 21.5 L 13 20 L 16.5 20 C 18.414955 20 20 18.414955 20 16.5 L 20 13 L 21.5 13 A 1.50015 1.50015 0 1 0 21.5 10 L 20 10 L 20 9.5 C 20 7.5850452 18.414955 6 16.5 6 L 9.5 6 z M 31.5 6 C 29.585045 6 28 7.5850452 28 9.5 L 28 10 L 26.5 10 A 1.50015 1.50015 0 1 0 26.5 13 L 28 13 L 28 16.5 C 28 18.414955 29.585045 20 31.5 20 L 35 20 L 35 21.5 A 1.50015 1.50015 0 1 0 38 21.5 L 38 20 L 38.5 20 C 40.414955 20 42 18.414955 42 16.5 L 42 9.5 C 42 7.5850452 40.414955 6 38.5 6 L 31.5 6 z M 9.5 9 L 16.5 9 C 16.795045 9 17 9.2049548 17 9.5 L 17 11.253906 A 1.50015 1.50015 0 0 0 17 11.740234 L 17 16.5 C 17 16.795045 16.795045 17 16.5 17 L 11.746094 17 A 1.50015 1.50015 0 0 0 11.476562 16.978516 A 1.50015 1.50015 0 0 0 11.257812 17 L 9.5 17 C 9.2049548 17 9 16.795045 9 16.5 L 9 9.5 C 9 9.2049548 9.2049548 9 9.5 9 z M 31.5 9 L 38.5 9 C 38.795045 9 39 9.2049548 39 9.5 L 39 16.5 C 39 16.795045 38.795045 17 38.5 17 L 36.746094 17 A 1.50015 1.50015 0 0 0 36.476562 16.978516 A 1.50015 1.50015 0 0 0 36.257812 17 L 31.5 17 C 31.204955 17 31 16.795045 31 16.5 L 31 11.746094 A 1.50015 1.50015 0 0 0 31 11.259766 L 31 9.5 C 31 9.2049548 31.204955 9 31.5 9 z M 11.476562 24.978516 A 1.50015 1.50015 0 0 0 10 26.5 L 10 28 L 9.5 28 C 7.5850452 28 6 29.585045 6 31.5 L 6 38.5 C 6 40.414955 7.5850452 42 9.5 42 L 16.5 42 C 18.414955 42 20 40.414955 20 38.5 L 20 38 L 21.5 38 A 1.50015 1.50015 0 1 0 21.5 35 L 20 35 L 20 31.5 C 20 29.585045 18.414955 28 16.5 28 L 13 28 L 13 26.5 A 1.50015 1.50015 0 0 0 11.476562 24.978516 z M 36.476562 24.978516 A 1.50015 1.50015 0 0 0 35 26.5 L 35 28 L 31.5 28 C 29.585045 28 28 29.585045 28 31.5 L 28 35 L 26.5 35 A 1.50015 1.50015 0 1 0 26.5 38 L 28 38 L 28 38.5 C 28 40.414955 29.585045 42 31.5 42 L 38.5 42 C 40.414955 42 42 40.414955 42 38.5 L 42 31.5 C 42 29.585045 40.414955 28 38.5 28 L 38 28 L 38 26.5 A 1.50015 1.50015 0 0 0 36.476562 24.978516 z M 9.5 31 L 11.253906 31 A 1.50015 1.50015 0 0 0 11.740234 31 L 16.5 31 C 16.795045 31 17 31.204955 17 31.5 L 17 36.253906 A 1.50015 1.50015 0 0 0 17 36.740234 L 17 38.5 C 17 38.795045 16.795045 39 16.5 39 L 9.5 39 C 9.2049548 39 9 38.795045 9 38.5 L 9 31.5 C 9 31.204955 9.2049548 31 9.5 31 z M 31.5 31 L 36.253906 31 A 1.50015 1.50015 0 0 0 36.740234 31 L 38.5 31 C 38.795045 31 39 31.204955 39 31.5 L 39 38.5 C 39 38.795045 38.795045 39 38.5 39 L 31.5 39 C 31.204955 39 31 38.795045 31 38.5 L 31 36.746094 A 1.50015 1.50015 0 0 0 31 36.259766 L 31 31.5 C 31 31.204955 31.204955 31 31.5 31 z"></path>--}}
{{-- </svg>--}}
{{-- <p class="ml-2 mr-auto">Transactions</p>--}}
{{-- <svg class="w-3 h-3 transform transition-transform" :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{-- <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M19 9l-7 7-7-7"></path>--}}
{{-- </svg>--}}
{{-- </a>--}}
{{-- <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="bg-none ml-4 mt-2 rounded mx-2" x-transition>--}}
{{-- <a href="{{ route('transaction-walkin') }}" @click="activeChildLink = 'admin-transactions-walkin'; localStorage.setItem('activeChildLink', 'admin-transactions-walkin')"--}}
{{-- :class="{ 'text-[#FF9100] text-[12px] bg-opacity-40 font-bold': activeChildLink === 'admin-transactions-walkin' }"--}}
{{-- class="text-[12px] block py-2.5 px-4 rounded transition duration-200 hover:bg-[#D9D9D9] hover:text-[#FF9100]"> Walkin</a>--}}
{{-- <a href="{{ route('transaction-request') }}" @click="activeChildLink = 'admin-transactions-request'; localStorage.setItem('activeChildLink', 'admin-transactions-request')"--}}
{{-- :class="{ 'text-[#FF9100] text-[12px] bg-opacity-40 font-bold': activeChildLink === 'admin-transactions-request' }"--}}
{{-- class="text-[12px] block py-2.5 px-4 rounded transition duration-200 hover:bg-[#D9D9D9] hover:text-[#FF9100]"> Request </a>--}}
{{-- <a href="{{ route('transaction-shelter-assistance') }}" @click="activeChildLink = 'admin-transactions-shelterAsst'; localStorage.setItem('activeChildLink', 'admin-transactions-shelterAsst')"--}}
{{-- :class="{ 'text-[#FF9100] text-[12px] bg-opacity-40 font-bold': activeChildLink === 'admin-transactions-shelterAsst' }"--}}
{{-- class="text-[12px] block py-2.5 px-4 rounded transition duration-200 hover:bg-[#D9D9D9] hover:text-[#FF9100] hover:text-[12px]"> Shelter Assistance </a>--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- <a href="{{ route('masterlist-applicants') }}"--}}
{{-- @click="activeLink = 'applicants'; activeChildLink = ''; localStorage.setItem('activeLink', 'applicants'); localStorage.setItem('activeChildLink', '')"--}}
{{-- :class="{'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'applicants' }"--}}
{{-- class="ml-4 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[12px] hover:text-[#FF9100]">--}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{-- <path d="M 23.984375 5.9863281 A 1.0001 1.0001 0 0 0 23 7 L 23 13 A 1.0001 1.0001 0 1 0 25 13 L 25 7 A 1.0001 1.0001 0 0 0 23.984375 5.9863281 z M 13.869141 9.8691406 A 1.0001 1.0001 0 0 0 13.171875 11.585938 L 17.414062 15.828125 A 1.0001 1.0001 0 1 0 18.828125 14.414062 L 14.585938 10.171875 A 1.0001 1.0001 0 0 0 13.869141 9.8691406 z M 34.101562 9.8691406 A 1.0001 1.0001 0 0 0 33.414062 10.171875 L 29.171875 14.414062 A 1.0001 1.0001 0 1 0 30.585938 15.828125 L 34.828125 11.585938 A 1.0001 1.0001 0 0 0 34.101562 9.8691406 z M 24 16 C 22.458334 16 21.112148 16.632133 20.253906 17.597656 C 19.395664 18.563179 19 19.791667 19 21 C 19 22.208333 19.395664 23.436821 20.253906 24.402344 C 21.112148 25.367867 22.458334 26 24 26 C 25.541666 26 26.887852 25.367867 27.746094 24.402344 C 28.604336 23.436821 29 22.208333 29 21 C 29 19.791667 28.604336 18.563179 27.746094 17.597656 C 26.887852 16.632133 25.541666 16 24 16 z M 24 19 C 24.791666 19 25.195482 19.242867 25.503906 19.589844 C 25.81233 19.936821 26 20.458333 26 21 C 26 21.541667 25.81233 22.063179 25.503906 22.410156 C 25.195482 22.757133 24.791666 23 24 23 C 23.208334 23 22.804518 22.757133 22.496094 22.410156 C 22.18767 22.063179 22 21.541667 22 21 C 22 20.458333 22.18767 19.936821 22.496094 19.589844 C 22.804518 19.242867 23.208334 19 24 19 z M 9 22 C 7.4583337 22 6.1121484 22.632133 5.2539062 23.597656 C 4.3956641 24.563179 4 25.791667 4 27 C 4 28.208333 4.3956641 29.436821 5.2539062 30.402344 C 6.1121484 31.367867 7.4583337 32 9 32 C 10.541666 32 11.887852 31.367867 12.746094 30.402344 C 13.604336 29.436821 14 28.208333 14 27 C 14 25.791667 13.604336 24.563179 12.746094 23.597656 C 11.887852 22.632133 10.541666 22 9 22 z M 39 22 C 37.458334 22 36.112148 22.632133 35.253906 23.597656 C 34.395664 24.563179 34 25.791667 34 27 C 34 28.208333 34.395664 29.436821 35.253906 30.402344 C 36.112148 31.367867 37.458334 32 39 32 C 40.541666 32 41.887852 31.367867 42.746094 30.402344 C 43.604336 29.436821 44 28.208333 44 27 C 44 25.791667 43.604336 24.563179 42.746094 23.597656 C 41.887852 22.632133 40.541666 22 39 22 z M 9 25 C 9.791666 25 10.195482 25.242867 10.503906 25.589844 C 10.81233 25.936821 11 26.458333 11 27 C 11 27.541667 10.81233 28.063179 10.503906 28.410156 C 10.195482 28.757133 9.791666 29 9 29 C 8.208334 29 7.8045177 28.757133 7.4960938 28.410156 C 7.1876698 28.063179 7 27.541667 7 27 C 7 26.458333 7.1876698 25.936821 7.4960938 25.589844 C 7.8045177 25.242867 8.208334 25 9 25 z M 39 25 C 39.791666 25 40.195482 25.242867 40.503906 25.589844 C 40.81233 25.936821 41 26.458333 41 27 C 41 27.541667 40.81233 28.063179 40.503906 28.410156 C 40.195482 28.757133 39.791666 29 39 29 C 38.208334 29 37.804518 28.757133 37.496094 28.410156 C 37.18767 28.063179 37 27.541667 37 27 C 37 26.458333 37.18767 25.936821 37.496094 25.589844 C 37.804518 25.242867 38.208334 25 39 25 z M 18.052734 28 C 16.384766 28 15 29.384766 15 31.052734 L 15 34.021484 C 14.979733 34.021074 14.96762 34 14.947266 34 L 3.0527344 34 C 1.3847659 34 -2.9605947e-16 35.384766 0 37.052734 L 0 38.949219 C 0 40.778128 1.1549049 42.35297 2.7695312 43.382812 C 4.3841576 44.412656 6.526281 45.001953 9 45.001953 C 11.473607 45.001953 13.613818 44.412548 15.228516 43.382812 C 15.743751 43.054234 16.100843 42.590377 16.5 42.160156 C 16.898941 42.589937 17.25472 43.054455 17.769531 43.382812 C 19.384158 44.412656 21.526281 45.001953 24 45.001953 C 26.473607 45.001953 28.613818 44.412548 30.228516 43.382812 C 30.743751 43.054234 31.100843 42.590377 31.5 42.160156 C 31.898941 42.589937 32.25472 43.054455 32.769531 43.382812 C 34.384158 44.412656 36.526281 45.001953 39 45.001953 C 41.473607 45.001953 43.613818 44.412548 45.228516 43.382812 C 46.843213 42.353077 48 40.77836 48 38.949219 L 48 37.052734 C 48 35.384766 46.615234 34 44.947266 34 L 33.052734 34 C 33.032384 34 33.02026 34.021074 33 34.021484 L 33 31.052734 C 32.999996 29.38477 31.615234 28 29.947266 28 L 18.052734 28 z M 18.052734 31 L 29.947266 31 C 29.993297 31 30 31.006703 30 31.052734 L 30 37.052734 L 30 38.949219 C 30 39.503077 29.637239 40.203001 28.617188 40.853516 C 27.597135 41.50403 25.987393 42.001953 24 42.001953 C 22.012719 42.001953 20.402936 41.504172 19.382812 40.853516 C 18.362689 40.202859 18 39.502309 18 38.949219 L 18 37.052734 L 18 31.052734 C 18 31.006703 18.006703 31 18.052734 31 z M 3.0527344 37 L 14.947266 37 C 14.993297 37 15 37.006703 15 37.052734 L 15 38.949219 C 15 39.503077 14.637239 40.203001 13.617188 40.853516 C 12.597134 41.50403 10.987393 42.001953 9 42.001953 C 7.012719 42.001953 5.4029362 41.504172 4.3828125 40.853516 C 3.3626888 40.202859 3 39.502309 3 38.949219 L 3 37.052734 C 3 37.006703 3.0067029 37 3.0527344 37 z M 33.052734 37 L 44.947266 37 C 44.993297 37 45 37.006703 45 37.052734 L 45 38.949219 C 45 39.503077 44.637239 40.203001 43.617188 40.853516 C 42.597135 41.50403 40.987393 42.001953 39 42.001953 C 37.012719 42.001953 35.402936 41.504172 34.382812 40.853516 C 33.36269 40.202859 33 39.502309 33 38.949219 L 33 37.052734 C 33 37.006703 33.006703 37 33.052734 37 z"></path>--}}
{{-- </svg>--}}
{{-- <p class="ml-2">Masterlist of Applicants</p>--}}
{{-- </a>--}}

{{-- <a href="{{ route('shelter-assistance-grantees') }}"--}}
{{-- @click="activeLink = 'grantee'; activeChildLink = ''; localStorage.setItem('activeLink', 'grantee'); localStorage.setItem('activeChildLink', '')"--}}
{{-- :class="{ 'bg-[rgb(217,217,217)] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'grantee' }"--}}
{{-- class="ml-4 flex items-center text-[12px] py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[12px] hover:text-[#FF9100] ">--}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{-- <path d="M 24 5.0273438 C 22.851301 5.0273438 21.70304 5.4009945 20.753906 6.1484375 A 1.50015 1.50015 0 0 0 20.658203 6.2304688 L 4.5546875 21.255859 C 2.8485365 22.847233 2.8013499 25.586506 4.4511719 27.236328 C 6.036957 28.822113 8.6399476 28.853448 10.261719 27.304688 A 1.50015 1.50015 0 0 0 10.265625 27.300781 L 24.003906 14.085938 L 37.734375 27.298828 A 1.50015 1.50015 0 0 0 37.738281 27.302734 C 39.359795 28.852802 41.963043 28.824063 43.548828 27.238281 C 45.19865 25.588459 45.151465 22.849186 43.445312 21.257812 L 27.341797 6.2304688 A 1.50015 1.50015 0 0 0 27.246094 6.1484375 C 26.296957 5.4009942 25.148699 5.0273438 24 5.0273438 z M 24 8.0195312 C 24.485694 8.0195312 24.970178 8.1837987 25.378906 8.5019531 L 41.400391 23.451172 C 41.89424 23.911798 41.905915 24.63901 41.427734 25.117188 C 40.971519 25.573401 40.277033 25.580696 39.810547 25.134766 L 25.044922 10.923828 A 1.50015 1.50015 0 0 0 22.964844 10.923828 L 8.1894531 25.134766 C 7.723224 25.580006 7.0284805 25.571449 6.5722656 25.115234 C 6.0940876 24.637056 6.1057604 23.909845 6.5996094 23.449219 L 22.621094 8.5019531 C 23.029822 8.1837987 23.514306 8.0195312 24 8.0195312 z M 7.4765625 30.978516 A 1.50015 1.50015 0 0 0 6 32.5 L 6 33.5 A 1.50015 1.50015 0 1 0 9 33.5 L 9 32.5 A 1.50015 1.50015 0 0 0 7.4765625 30.978516 z M 40.476562 30.978516 A 1.50015 1.50015 0 0 0 39 32.5 L 39 33.5 A 1.50015 1.50015 0 1 0 42 33.5 L 42 32.5 A 1.50015 1.50015 0 0 0 40.476562 30.978516 z M 40.322266 38.175781 L 39.222656 38.851562 L 38.990234 39.515625 L 38.980469 39.607422 L 38.955078 39.693359 L 38.908203 39.777344 L 38.849609 39.849609 L 38.777344 39.908203 L 38.666016 39.96875 L 37.90625 41.013672 L 38.238281 42.259766 L 39.417969 42.787109 L 40.095703 42.605469 L 40.333984 42.476562 L 40.572266 42.316406 L 40.869141 42.072266 L 41.072266 41.869141 L 41.316406 41.572266 L 41.476562 41.333984 L 41.662109 40.994141 L 41.775391 40.722656 L 41.892578 40.347656 L 41.951172 40.052734 L 41.976562 39.816406 L 41.539062 38.601562 L 40.322266 38.175781 z M 6.9433594 38.275391 L 6.0722656 39.228516 L 6.03125 39.929688 L 6.0976562 40.302734 L 6.1738281 40.576172 L 6.3046875 40.921875 L 6.4277344 41.171875 L 6.6191406 41.482422 L 6.7832031 41.701172 L 7.0273438 41.972656 L 7.2265625 42.15625 L 7.515625 42.378906 L 7.7480469 42.525391 L 7.9355469 42.621094 L 9.2246094 42.658203 L 10.066406 41.677734 L 9.8339844 40.408203 L 9.3007812 39.951172 L 9.2382812 39.919922 L 9.1621094 39.861328 L 9.1054688 39.798828 L 9.0566406 39.71875 L 9.0273438 39.638672 L 8.984375 39.402344 L 8.2324219 38.353516 L 6.9433594 38.275391 z M 14.75 40 L 13.583984 40.554688 L 13.283203 41.810547 L 14.066406 42.835938 L 14.75 43 L 16.804688 43 L 17.970703 42.445312 L 18.273438 41.189453 L 17.488281 40.164062 L 16.804688 40 L 14.75 40 z M 22.970703 40 L 21.806641 40.554688 L 21.503906 41.810547 L 22.289062 42.835938 L 22.970703 43 L 25.027344 43 L 26.191406 42.445312 L 26.494141 41.189453 L 25.710938 40.164062 L 25.027344 40 L 22.970703 40 z M 31.193359 40 L 30.027344 40.554688 L 29.726562 41.810547 L 30.509766 42.835938 L 31.193359 43 L 33.248047 43 L 34.414062 42.445312 L 34.716797 41.189453 L 33.931641 40.164062 L 33.248047 40 L 31.193359 40 z"></path>--}}
{{-- </svg>--}}
{{-- <p class="ml-2">Shelter Assistace Grantees</p>--}}
{{-- </a>--}}

{{-- <a href="{{ route('awardee-list') }}"--}}
{{-- @click="activeLink = 'awardee'; activeChildLink = ''; localStorage.setItem('activeLink', 'awardee'); localStorage.setItem('activeChildLink', '')"--}}
{{-- :class="{'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'awardee' }"--}}
{{-- class="ml-4 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">--}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{-- <path d="M 21 4 C 15.494917 4 11 8.494921 11 14 C 11 19.505079 15.494917 24 21 24 C 26.505083 24 31 19.505079 31 14 C 31 8.494921 26.505083 4 21 4 z M 21 7 C 24.883764 7 28 10.116238 28 14 C 28 17.883762 24.883764 21 21 21 C 17.116236 21 14 17.883762 14 14 C 14 10.116238 17.116236 7 21 7 z M 35 24 C 28.925 24 24 28.925 24 35 C 24 41.075 28.925 46 35 46 C 41.075 46 46 41.075 46 35 C 46 28.925 41.075 24 35 24 z M 9.5 28 C 7.02 28 5 30.02 5 32.5 L 5 33.699219 C 5 39.479219 12.03 44 21 44 C 22.49 44 23.929062 43.870859 25.289062 43.630859 C 24.549063 42.800859 23.910391 41.880859 23.400391 40.880859 C 22.630391 40.960859 21.83 41 21 41 C 12.97 41 8 37.209219 8 33.699219 L 8 32.5 C 8 31.67 8.67 31 9.5 31 L 22.630859 31 C 22.970859 29.93 23.450781 28.93 24.050781 28 L 9.5 28 z M 35 28 C 35.48 28 35.908453 28.305766 36.064453 28.759766 L 37.177734 32 L 40.875 32 C 41.358 32 41.787406 32.308625 41.941406 32.765625 C 42.095406 33.223625 41.939687 33.729484 41.554688 34.021484 L 38.560547 36.292969 L 39.574219 39.539062 C 39.720219 40.005063 39.548391 40.510969 39.150391 40.792969 C 38.955391 40.930969 38.727 41 38.5 41 C 38.263 41 38.025172 40.925391 37.826172 40.775391 L 35 38.660156 L 32.173828 40.775391 C 31.783828 41.068391 31.248609 41.076922 30.849609 40.794922 C 30.451609 40.512922 30.279781 40.005063 30.425781 39.539062 L 31.439453 36.294922 L 28.445312 34.021484 C 28.060312 33.729484 27.904594 33.225578 28.058594 32.767578 C 28.213594 32.309578 28.642 32 29.125 32 L 32.822266 32 L 33.935547 28.759766 C 34.091547 28.305766 34.52 28 35 28 z"></path>--}}
{{-- </svg>--}}
{{-- <p class="ml-2">Awardee List</p>--}}
{{-- </a>--}}

{{-- <a href="{{ route('lot-list') }}"--}}
{{-- @click="activeLink = 'lot'; activeChildLink = ''; localStorage.setItem('activeLink', 'lot'); localStorage.setItem('activeChildLink', '')"--}}
{{-- :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'lot' }"--}}
{{-- class="ml-4 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">--}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{-- <path d="M 24 4 C 14.629252 4 7 11.629252 7 21 C 7 25.20679 8.5433056 29.064832 11.078125 32.03125 L 11.085938 32.039062 L 11.091797 32.046875 C 11.091797 32.046875 18.323729 40.299027 20.898438 42.755859 C 22.622568 44.39966 25.375478 44.39966 27.099609 42.755859 C 30.034388 39.956663 36.910156 32.042969 36.910156 32.042969 L 36.914062 32.037109 L 36.919922 32.03125 C 39.456988 29.064801 41 25.20679 41 21 C 41 11.629252 33.370748 4 24 4 z M 24 7 C 31.749252 7 38 13.250748 38 21 C 38 24.47521 36.733544 27.632586 34.638672 30.082031 C 34.625032 30.097631 27.590036 38.143501 25.029297 40.585938 C 24.435428 41.152136 23.562619 41.152136 22.96875 40.585938 C 20.828579 38.543748 13.381099 30.106639 13.359375 30.082031 L 13.357422 30.080078 C 11.265326 27.630829 10 24.474248 10 21 C 10 13.250748 16.250748 7 24 7 z M 24 15 C 22.125 15 20.528815 15.757133 19.503906 16.910156 C 18.478997 18.063179 18 19.541667 18 21 C 18 22.458333 18.478997 23.936821 19.503906 25.089844 C 20.528815 26.242867 22.125 27 24 27 C 25.875 27 27.471185 26.242867 28.496094 25.089844 C 29.521003 23.936821 30 22.458333 30 21 C 30 19.541667 29.521003 18.063179 28.496094 16.910156 C 27.471185 15.757133 25.875 15 24 15 z M 24 18 C 25.124999 18 25.778816 18.367867 26.253906 18.902344 C 26.728997 19.436821 27 20.208333 27 21 C 27 21.791667 26.728997 22.563179 26.253906 23.097656 C 25.778816 23.632133 25.124999 24 24 24 C 22.875001 24 22.221184 23.632133 21.746094 23.097656 C 21.271003 22.563179 21 21.791667 21 21 C 21 20.208333 21.271003 19.436821 21.746094 18.902344 C 22.221184 18.367867 22.875001 18 24 18 z"></path>--}}
{{-- </svg>--}}
{{-- <p class="ml-2">LotList List</p>--}}
{{-- </a>--}}

{{-- <a href="{{ route('blacklist') }}"--}}
{{-- @click="activeLink = 'blacklist'; activeChildLink = ''; localStorage.setItem('activeLink', 'blacklist'); localStorage.setItem('activeChildLink', '')"--}}
{{-- :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'blacklist' }"--}}
{{-- class="ml-4 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">--}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{-- <path d="M 17 2 C 11.494917 2 7 6.494921 7 12 C 7 17.505079 11.494917 22 17 22 C 22.505083 22 27 17.505079 27 12 C 27 6.494921 22.505083 2 17 2 z M 17 5 C 20.883764 5 24 8.1162385 24 12 C 24 15.883762 20.883764 19 17 19 C 13.116236 19 10 15.883762 10 12 C 10 8.1162385 13.116236 5 17 5 z M 35 24 C 28.925 24 24 28.925 24 35 C 24 41.075 28.925 46 35 46 C 41.075 46 46 41.075 46 35 C 46 28.925 41.075 24 35 24 z M 6.2226562 26 C 4.1696563 26 2.5 27.784516 2.5 29.978516 L 2.5 31.5 C 2.5 34.781 4.1953906 37.632344 7.2753906 39.527344 C 9.8663906 41.122344 13.32 42 17 42 C 19.19 42 21.431516 41.675766 23.478516 41.009766 C 23.018516 40.128766 22.664062 39.186172 22.414062 38.201172 C 20.717062 38.735172 18.837 39 17 39 C 11.461 39 5.5 36.653 5.5 31.5 L 5.5 29.978516 C 5.5 29.447516 5.8306562 29 6.2226562 29 L 23.474609 29 C 24.049609 27.897 24.778812 26.889 25.632812 26 L 6.2226562 26 z M 30 29 C 30.25575 29 30.511531 29.097469 30.707031 29.292969 L 35 33.585938 L 39.292969 29.292969 C 39.683969 28.901969 40.316031 28.901969 40.707031 29.292969 C 41.098031 29.683969 41.098031 30.316031 40.707031 30.707031 L 36.414062 35 L 40.707031 39.292969 C 41.098031 39.683969 41.098031 40.316031 40.707031 40.707031 C 40.512031 40.902031 40.256 41 40 41 C 39.744 41 39.487969 40.902031 39.292969 40.707031 L 35 36.414062 L 30.707031 40.707031 C 30.512031 40.902031 30.256 41 30 41 C 29.744 41 29.487969 40.902031 29.292969 40.707031 C 28.901969 40.316031 28.901969 39.683969 29.292969 39.292969 L 33.585938 35 L 29.292969 30.707031 C 28.901969 30.316031 28.901969 29.683969 29.292969 29.292969 C 29.488469 29.097469 29.74425 29 30 29 z"></path>--}}
{{-- </svg>--}}
{{-- <p class="ml-2">Blacklist</p>--}}
{{-- </a>--}}

{{-- <a href="{{ route('reports-summary-informal-settlers') }}"--}}
{{-- @click="activeLink = 'reports'; activeChildLink = ''; localStorage.setItem('activeLink', 'reports'); localStorage.setItem('activeChildLink', '')"--}}
{{-- :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'reports' }"--}}
{{-- class="ml-4 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">--}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{-- <path d="M 12.5 4 C 10.02 4 8 6.02 8 8.5 L 8 39.5 C 8 41.98 10.02 44 12.5 44 L 35.5 44 C 37.981 44 40 41.981 40 39.5 L 40 18.5 C 40 18.085 39.831797 17.710703 39.560547 17.439453 L 26.560547 4.4394531 C 26.289297 4.1682031 25.915 4 25.5 4 L 12.5 4 z M 12.5 7 L 24 7 L 24 15.5 C 24 17.98 26.02 20 28.5 20 L 37 20 L 37 39.5 C 37 40.327 36.327 41 35.5 41 L 12.5 41 C 11.67 41 11 40.33 11 39.5 L 11 8.5 C 11 7.67 11.67 7 12.5 7 z M 27 9.1210938 L 34.878906 17 L 28.5 17 C 27.67 17 27 16.33 27 15.5 L 27 9.1210938 z M 32 25 A 2 2 0 0 0 30.005859 26.873047 L 26 30.878906 L 22.994141 27.873047 A 2 2 0 0 0 21 26 A 2 2 0 0 0 19.005859 27.873047 L 15.873047 31.005859 A 2 2 0 0 0 16 35 A 2 2 0 0 0 17.994141 33.126953 L 21 30.121094 L 24.005859 33.126953 A 2 2 0 0 0 26 35 A 2 2 0 0 0 27.994141 33.126953 L 32.126953 28.994141 A 2 2 0 0 0 32 25 z"></path>--}}
{{-- </svg>--}}
{{-- <p class="ml-2">Reports</p>--}}
{{-- </a>--}}

{{-- <a href="{{ route('activity-logs') }}"--}}
{{-- @click="activeLink = 'activity'; activeChildLink = ''; localStorage.setItem('activeLink', 'activity'); localStorage.setItem('activeChildLink', '')"--}}
{{-- :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'activity' }"--}}
{{-- class="ml-4 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">--}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{-- <path d="M 12.5 5 C 10.019 5 8 7.019 8 9.5 L 8 33 L 6.5 33 C 5.672 33 5 33.671 5 34.5 L 5 36.5 C 5 40.084 7.916 43 11.5 43 L 25.474609 43 C 24.985609 42.062 24.611328 41.055 24.361328 40 L 11.5 40 C 9.57 40 8 38.43 8 36.5 L 8 36 L 24.050781 36 C 24.129781 34.961 24.325766 33.956 24.634766 33 L 11 33 L 11 9.5 C 11 8.673 11.673 8 12.5 8 L 35.5 8 C 36.327 8 37 8.673 37 9.5 L 37 24 C 38.034 24 39.035 24.133328 40 24.361328 L 40 9.5 C 40 7.019 37.981 5 35.5 5 L 12.5 5 z M 16.5 13 A 1.5 1.5 0 0 0 16.5 16 A 1.5 1.5 0 0 0 16.5 13 z M 21.5 13 A 1.50015 1.50015 0 1 0 21.5 16 L 31.5 16 A 1.50015 1.50015 0 1 0 31.5 13 L 21.5 13 z M 16.5 19 A 1.5 1.5 0 0 0 16.5 22 A 1.5 1.5 0 0 0 16.5 19 z M 21.5 19 A 1.50015 1.50015 0 1 0 21.5 22 L 31.5 22 A 1.50015 1.50015 0 1 0 31.5 19 L 21.5 19 z M 16.5 25 A 1.5 1.5 0 0 0 16.5 28 A 1.5 1.5 0 0 0 16.5 25 z M 21.5 25 C 20.672 25 20 25.671 20 26.5 C 20 27.329 20.672 28 21.5 28 L 27.632812 28 C 28.828813 26.755 30.266 25.743734 31.875 25.052734 C 31.754 25.021734 31.63 25 31.5 25 L 21.5 25 z M 37 26 C 30.925 26 26 30.925 26 37 C 26 43.075 30.925 48 37 48 C 43.075 48 48 43.075 48 37 C 48 30.925 43.075 26 37 26 z M 33 30 L 41 30 C 41.553 30 42 30.448 42 31 C 42 31.552 41.553 32 41 32 L 41 34 C 41 35.2 40.457187 36.266 39.617188 37 C 40.457188 37.734 41 38.8 41 40 L 41 42 C 41.553 42 42 42.448 42 43 C 42 43.552 41.553 44 41 44 L 40 44 L 34 44 L 33 44 C 32.447 44 32 43.552 32 43 C 32 42.448 32.447 42 33 42 L 33 40 C 33 38.8 33.542813 37.734 34.382812 37 C 33.542812 36.266 33 35.2 33 34 L 33 32 C 32.447 32 32 31.552 32 31 C 32 30.448 32.447 30 33 30 z M 35 32 L 35 34 L 39 34 L 39 32 L 35 32 z M 37 38 C 35.897 38 35 38.897 35 40 L 35 41.611328 L 36.683594 41.050781 C 36.888594 40.982781 37.111406 40.982781 37.316406 41.050781 L 39 41.611328 L 39 40 C 39 38.897 38.103 38 37 38 z"></path>--}}
{{-- </svg>--}}
{{-- <p class="ml-2">Activity Logs</p>--}}
{{-- </a>--}}
{{-- <a href="{{ route('user-settings') }}"--}}
{{-- @click="activeLink = 'settings'; activeChildLink = ''; localStorage.setItem('activeLink', 'settings'); localStorage.setItem('activeChildLink', '')"--}}
{{-- :class="{ 'bg-[#D9D9D9] text-[12px] bg-opacity-40 text-[#FF9100] border-l-[#FF9100] border-l-[5px] font-bold': activeLink === 'settings' }"--}}
{{-- class="ml-4 flex items-center py-2.5 px-4 rounded hover:bg-[#D9D9D9] hover:bg-opacity-40 hover:border-l-[#D9D9D9] hover:border-l-[5px] hover:text-[#FF9100]">--}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" fill="currentColor" stroke="currentColor" viewBox="0 0 48 48" class="w-5 h-5" stroke-width="0.5">--}}
{{-- <path d="M 12.5 5 C 10.019 5 8 7.019 8 9.5 L 8 33 L 6.5 33 C 5.672 33 5 33.671 5 34.5 L 5 36.5 C 5 40.084 7.916 43 11.5 43 L 25.474609 43 C 24.985609 42.062 24.611328 41.055 24.361328 40 L 11.5 40 C 9.57 40 8 38.43 8 36.5 L 8 36 L 24.050781 36 C 24.129781 34.961 24.325766 33.956 24.634766 33 L 11 33 L 11 9.5 C 11 8.673 11.673 8 12.5 8 L 35.5 8 C 36.327 8 37 8.673 37 9.5 L 37 24 C 38.034 24 39.035 24.133328 40 24.361328 L 40 9.5 C 40 7.019 37.981 5 35.5 5 L 12.5 5 z M 16.5 13 A 1.5 1.5 0 0 0 16.5 16 A 1.5 1.5 0 0 0 16.5 13 z M 21.5 13 A 1.50015 1.50015 0 1 0 21.5 16 L 31.5 16 A 1.50015 1.50015 0 1 0 31.5 13 L 21.5 13 z M 16.5 19 A 1.5 1.5 0 0 0 16.5 22 A 1.5 1.5 0 0 0 16.5 19 z M 21.5 19 A 1.50015 1.50015 0 1 0 21.5 22 L 31.5 22 A 1.50015 1.50015 0 1 0 31.5 19 L 21.5 19 z M 16.5 25 A 1.5 1.5 0 0 0 16.5 28 A 1.5 1.5 0 0 0 16.5 25 z M 21.5 25 C 20.672 25 20 25.671 20 26.5 C 20 27.329 20.672 28 21.5 28 L 27.632812 28 C 28.828813 26.755 30.266 25.743734 31.875 25.052734 C 31.754 25.021734 31.63 25 31.5 25 L 21.5 25 z M 37 26 C 30.925 26 26 30.925 26 37 C 26 43.075 30.925 48 37 48 C 43.075 48 48 43.075 48 37 C 48 30.925 43.075 26 37 26 z M 33 30 L 41 30 C 41.553 30 42 30.448 42 31 C 42 31.552 41.553 32 41 32 L 41 34 C 41 35.2 40.457187 36.266 39.617188 37 C 40.457188 37.734 41 38.8 41 40 L 41 42 C 41.553 42 42 42.448 42 43 C 42 43.552 41.553 44 41 44 L 40 44 L 34 44 L 33 44 C 32.447 44 32 43.552 32 43 C 32 42.448 32.447 42 33 42 L 33 40 C 33 38.8 33.542813 37.734 34.382812 37 C 33.542812 36.266 33 35.2 33 34 L 33 32 C 32.447 32 32 31.552 32 31 C 32 30.448 32.447 30 33 30 z M 35 32 L 35 34 L 39 34 L 39 32 L 35 32 z M 37 38 C 35.897 38 35 38.897 35 40 L 35 41.611328 L 36.683594 41.050781 C 36.888594 40.982781 37.111406 40.982781 37.316406 41.050781 L 39 41.611328 L 39 40 C 39 38.897 38.103 38 37 38 z"></path>--}}
{{-- </svg>--}}
{{-- <p class="ml-2">User Settings</p>--}}
{{-- </a>--}}
{{-- </nav>--}}
{{-- </div>--}}
{{-- </div>--}}
{{--</div>--}}