<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex justify-center p-2 mt-2 ms-3 text-sm text-black rounded-lg sm:hidden hover:bg-blue-600 group focus:outline-none focus:ring-2 focus:ring-gray-200" id="openSidebar">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6 group-hover:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 sm:w-16" style="transition: width 0.3s ease, transform 0.3s ease;" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white shadow-xl">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="flex justify-center ps-2.5 mb-5 text-white max-sm:hidden" id="openSidebarMini">
            <span class="sr-only">Open sidebar</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-black hover:text-blue-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <a href="/dashboard" class="flex justify-center align-center mb-5">
            <img src="{{ asset('img/Marc_logo.png') }}" class="h-6 sm:h-7" alt="Medical Archive" />
        </a>

        <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="bg-transparent rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex justify-center hover:bg-blue-600 group sm:hidden" id="closeSidebarBtn">
            <svg aria-hidden="true" class="w-5 h-5 text-black group-hover:text-white " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>

        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}" class="flex justify-center p-2 text-black rounded-lg hover:bg-blue-600 group {{ Str::contains(Route::currentRouteName(), 'dashboard') ? 'bg-blue-600' : '' }}" id="navLink">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-black transition duration-75 group-hover:text-white {{ Str::contains(Route::currentRouteName(), 'dashboard') ? 'text-white' : '' }}" id="navIcon" viewBox="0 0 15 15">
                        <path fill="currentColor" fill-rule="evenodd" d="M2.8 1h-.05c-.229 0-.426 0-.6.041A1.5 1.5 0 0 0 1.04 2.15c-.04.174-.04.37-.04.6v2.5c0 .229 0 .426.041.6A1.5 1.5 0 0 0 2.15 6.96c.174.04.37.04.6.04h2.5c.229 0 .426 0 .6-.041A1.5 1.5 0 0 0 6.96 5.85c.04-.174.04-.37.04-.6v-2.5c0-.229 0-.426-.041-.6A1.5 1.5 0 0 0 5.85 1.04C5.676 1 5.48 1 5.25 1H5.2zm-.417 1.014c.043-.01.11-.014.417-.014h2.4c.308 0 .374.003.417.014a.5.5 0 0 1 .37.37c.01.042.013.108.013.416v2.4c0 .308-.003.374-.014.417a.5.5 0 0 1-.37.37C5.575 5.996 5.509 6 5.2 6H2.8c-.308 0-.374-.003-.417-.014a.5.5 0 0 1-.37-.37C2.004 5.575 2 5.509 2 5.2V2.8c0-.308.003-.374.014-.417a.5.5 0 0 1 .37-.37M9.8 1h-.05c-.229 0-.426 0-.6.041A1.5 1.5 0 0 0 8.04 2.15c-.04.174-.04.37-.04.6v2.5c0 .229 0 .426.041.6A1.5 1.5 0 0 0 9.15 6.96c.174.04.37.04.6.04h2.5c.229 0 .426 0 .6-.041a1.5 1.5 0 0 0 1.11-1.109c.04-.174.04-.37.04-.6v-2.5c0-.229 0-.426-.041-.6a1.5 1.5 0 0 0-1.109-1.11c-.174-.04-.37-.04-.6-.04h-.05zm-.417 1.014c.043-.01.11-.014.417-.014h2.4c.308 0 .374.003.417.014a.5.5 0 0 1 .37.37c.01.042.013.108.013.416v2.4c0 .308-.004.374-.014.417a.5.5 0 0 1-.37.37c-.042.01-.108.013-.416.013H9.8c-.308 0-.374-.003-.417-.014a.5.5 0 0 1-.37-.37C9.004 5.575 9 5.509 9 5.2V2.8c0-.308.003-.374.014-.417a.5.5 0 0 1 .37-.37M2.75 8h2.5c.229 0 .426 0 .6.041A1.5 1.5 0 0 1 6.96 9.15c.04.174.04.37.04.6v2.5c0 .229 0 .426-.041.6a1.5 1.5 0 0 1-1.109 1.11c-.174.04-.37.04-.6.04h-2.5c-.229 0-.426 0-.6-.041a1.5 1.5 0 0 1-1.11-1.109c-.04-.174-.04-.37-.04-.6v-2.5c0-.229 0-.426.041-.6A1.5 1.5 0 0 1 2.15 8.04c.174-.04.37-.04.6-.04m.05 1c-.308 0-.374.003-.417.014a.5.5 0 0 0-.37.37C2.004 9.425 2 9.491 2 9.8v2.4c0 .308.003.374.014.417a.5.5 0 0 0 .37.37c.042.01.108.013.416.013h2.4c.308 0 .374-.004.417-.014a.5.5 0 0 0 .37-.37c.01-.042.013-.108.013-.416V9.8c0-.308-.003-.374-.014-.417a.5.5 0 0 0-.37-.37C5.575 9.004 5.509 9 5.2 9zm7-1h-.05c-.229 0-.426 0-.6.041A1.5 1.5 0 0 0 8.04 9.15c-.04.174-.04.37-.04.6v2.5c0 .229 0 .426.041.6a1.5 1.5 0 0 0 1.109 1.11c.174.041.371.041.6.041h2.5c.229 0 .426 0 .6-.041a1.5 1.5 0 0 0 1.109-1.109c.041-.174.041-.371.041-.6V9.75c0-.229 0-.426-.041-.6a1.5 1.5 0 0 0-1.109-1.11c-.174-.04-.37-.04-.6-.04h-.05zm-.417 1.014c.043-.01.11-.014.417-.014h2.4c.308 0 .374.003.417.014a.5.5 0 0 1 .37.37c.01.042.013.108.013.416v2.4c0 .308-.004.374-.014.417a.5.5 0 0 1-.37.37c-.042.01-.108.013-.416.013H9.8c-.308 0-.374-.004-.417-.014a.5.5 0 0 1-.37-.37C9.004 12.575 9 12.509 9 12.2V9.8c0-.308.003-.374.014-.417a.5.5 0 0 1 .37-.37" clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap sm:hidden" id="textSidebarMini">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('doctor') }}" class="flex justify-center p-2 text-black rounded-lg hover:bg-blue-600 group {{ Str::contains(Route::currentRouteName(), 'doctor') ? 'bg-blue-600' : '' }}" id="navLink">
                    <svg class="flex-shrink-0 w-5 h-5 text-black font-bold transition duration-75 group-hover:text-white {{ Str::contains(Route::currentRouteName(), 'doctor') ? 'text-white' : '' }}" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_234_202)">
                            <path d="M3.91136 3C4.74077 3 5.4131 2.32843 5.4131 1.5C5.4131 0.671573 4.74077 0 3.91136 0C3.35549 0 2.87021 0.30165 2.61056 0.75H2.40963C1.16555 0.75 0.157022 1.75736 0.157022 3V9.75H1.65876V3C1.65876 2.58579 1.99494 2.25 2.40963 2.25H2.61056C2.87021 2.69835 3.35549 3 3.91136 3Z" fill="currentColor" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.53 9.75H1.65876H0.157022C-0.257668 9.75 -0.597279 10.0865 -0.559646 10.499C-0.385076 12.4124 0.454214 14.214 1.82543 15.5837C2.83095 16.588 4.06898 17.3066 5.41319 17.6873V19.5C5.41319 20.4798 6.04016 21.3133 6.91523 21.622C6.94721 24.5977 9.37214 27 12.3587 27C15.3653 27 17.8025 24.5656 17.8025 21.5625V18.5625C17.8025 17.0092 19.0631 15.75 20.6183 15.75C22.1734 15.75 23.434 17.0092 23.434 18.5625V20.378C22.5591 20.6869 21.9323 21.5203 21.9323 22.5C21.9323 23.7427 22.9408 24.75 24.1849 24.75C25.429 24.75 26.4375 23.7427 26.4375 22.5C26.4375 21.5203 25.8107 20.6869 24.9358 20.378V18.5625C24.9358 16.1808 23.0027 14.25 20.6183 14.25C18.2338 14.25 16.3008 16.1808 16.3008 18.5625V21.5625C16.3008 23.7371 14.5359 25.5 12.3587 25.5C10.2014 25.5 8.44887 23.7691 8.41711 21.6218C9.2918 21.3128 9.9184 20.4795 9.9184 19.5V17.6873C11.2626 17.3066 12.5007 16.588 13.5062 15.5837C14.8774 14.214 15.7167 12.4124 15.8913 10.499C15.9289 10.0865 15.5892 9.75 15.1745 9.75V3C15.1745 1.75736 14.166 0.75 12.9219 0.75H12.7209C12.4613 0.30165 11.976 0 11.4201 0C10.5907 0 9.9184 0.671573 9.9184 1.5C9.9184 2.32843 10.5907 3 11.4201 3C11.976 3 12.4613 2.69835 12.7209 2.25H12.9219C13.3366 2.25 13.6727 2.58579 13.6727 3V9.75H12.8017C12.387 9.75 12.0573 10.0882 11.9867 10.4964C11.8335 11.3809 11.4105 12.2038 10.7664 12.8471C9.94415 13.6685 8.82881 14.1299 7.66579 14.1299C6.50285 14.1299 5.38751 13.6685 4.56516 12.8471C3.92114 12.2038 3.4981 11.3809 3.34492 10.4964C3.27426 10.0882 2.94463 9.75 2.53 9.75ZM13.3577 11.25H14.2547C13.9741 12.4797 13.3514 13.6169 12.4443 14.523C11.177 15.7889 9.45812 16.5 7.66579 16.5C5.87355 16.5 4.15466 15.7889 2.88734 14.523C1.9802 13.6169 1.35758 12.4797 1.07694 11.25H1.97386C2.2372 12.2468 2.76082 13.1661 3.50328 13.9077C4.60728 15.0104 6.10459 15.6299 7.66579 15.6299C9.22707 15.6299 10.7244 15.0104 11.8284 13.9077C12.5708 13.1661 13.0944 12.2468 13.3577 11.25ZM24.1849 21.75C24.5996 21.75 24.9358 22.0858 24.9358 22.5C24.9358 22.9142 24.5996 23.25 24.1849 23.25C23.7702 23.25 23.434 22.9142 23.434 22.5C23.434 22.0858 23.7702 21.75 24.1849 21.75ZM8.41666 18V19.5C8.41666 19.9142 8.0805 20.25 7.66579 20.25C7.25109 20.25 6.91492 19.9142 6.91492 19.5V18H8.41666Z" fill="currentColor" />
                        </g>
                        <defs>
                            <clipPath id="clip0_234_202">
                                <rect width="27" height="27" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap sm:hidden" id="textSidebarMini">Our Doctors</span>
                </a>
            </li>
            @if (Auth::guard('doctors')->check() || Auth::guard('admins')->check())
            <li>
                <a href="{{ route('patient') }}" class="flex justify-center p-2 text-black rounded-lg hover:bg-blue-600 group {{ Str::contains(Route::currentRouteName(), 'patient') ? 'bg-blue-600' : '' }}" id="navLink">
                    <svg class="flex-shrink-0 w-5 h-5 text-black transition duration-75 group-hover:text-white {{ Str::contains(Route::currentRouteName(), 'patient') ? 'text-white' : '' }}" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.4114 12.3696C26.4792 12.7166 27.1491 13.7868 26.9716 14.8123C26.7736 15.9594 25.8361 16.7555 24.6542 16.7777C24.3851 16.7825 24.1168 16.7784 23.8421 16.7784V21.4532C23.9386 21.4964 24.0266 21.5342 24.1126 21.5761C25.3522 22.1777 25.7875 23.6637 25.0557 24.7946C24.3196 25.9322 22.751 26.2205 21.6318 25.4238C20.1892 24.3976 20.4104 22.2884 22.0361 21.539C22.1178 21.5012 22.2382 21.4222 22.2403 21.36C22.2573 20.8496 22.2495 20.3392 22.2495 19.8301H4.74602C4.74602 20.3034 4.75306 20.7578 4.74249 21.2122C4.73827 21.3816 4.78617 21.4674 4.95944 21.5484C5.792 21.9387 6.26322 22.5895 6.31957 23.4773C6.39212 24.6184 5.55111 25.6338 4.40792 25.8296C3.20557 26.0362 2.05534 25.384 1.6947 24.2902C1.33407 23.1972 1.86446 22.0318 2.95974 21.545C3.12597 21.4714 3.16824 21.3904 3.16753 21.2277C3.1626 18.8694 3.1626 16.511 3.16753 14.1527C3.16753 13.9859 3.11189 13.8725 2.99144 13.7591C2.36456 13.1683 1.75739 12.5587 1.12135 11.978C0.590258 11.4933 0.131716 10.9781 0 10.2597V9.65344C0.0619842 9.46169 0.107064 9.26387 0.187361 9.07955C0.839604 7.58205 2.83366 7.20599 4.05715 8.35983C5.35318 9.58255 6.63301 10.8215 7.91425 12.0584C8.04104 12.1806 8.16501 12.2346 8.34814 12.2346C11.8186 12.2292 15.289 12.2305 18.7594 12.2299C18.8439 12.2299 18.9291 12.2231 19.0158 12.219V3.05307H15.8856V4.54855C16.1356 4.54855 16.3709 4.54653 16.6068 4.54923C17.1203 4.55531 17.4493 4.86453 17.4507 5.3547C17.4535 6.87043 17.4535 8.38684 17.4507 9.90257C17.45 10.3948 17.1224 10.7114 16.6125 10.7134C15.5932 10.7168 14.574 10.7168 13.5555 10.7134C13.0413 10.7121 12.7089 10.3988 12.7082 9.91135C12.7046 8.39494 12.7046 6.87921 12.7075 5.36347C12.7089 4.85913 13.0371 4.55396 13.5696 4.54923C13.8035 4.5472 14.0373 4.54855 14.2789 4.54855V2.90454C13.509 2.60342 12.9948 2.08489 12.78 1.31521C12.5898 0.635326 12.7124 0.331504 13.2865 0H13.7084C14.0063 0.148535 14.2444 0.340956 14.2859 0.689339C14.3585 1.29631 14.6149 1.51641 15.2425 1.51641H22.7214C23.3448 1.51641 23.9675 1.51979 24.5908 1.51506C25.0191 1.51168 25.3748 1.25242 25.3966 0.86488C25.4206 0.445606 25.6164 0.175542 25.9932 0H26.4151C26.8377 0.196472 27.0413 0.50367 26.9892 0.96818C26.8603 2.12743 25.8699 3.01797 24.6514 3.02944C23.4033 3.0416 22.1558 3.03214 20.9077 3.03282H20.6372V12.2197C20.676 12.2251 20.6936 12.2292 20.7112 12.2292C21.9762 12.2299 23.242 12.2218 24.507 12.2366C24.8092 12.24 25.1254 12.2771 25.4107 12.3696H25.4114ZM15.8574 9.17813V6.07644H14.3071V9.17813H15.8574ZM4.74531 23.611C4.75095 23.2026 4.39947 22.8535 3.97192 22.844C3.53592 22.8346 3.16331 23.1857 3.16542 23.6043C3.16683 24.0121 3.52605 24.3564 3.95149 24.3584C4.37763 24.3605 4.73897 24.0202 4.74531 23.611ZM22.2375 18.2773V16.7791H21.9163C17.0499 16.7791 12.1834 16.7744 7.31695 16.7838C6.51186 16.7852 5.84271 16.5401 5.29613 15.975C5.13412 15.8069 4.95662 15.6522 4.75447 15.4625V18.2773H22.2375ZM23.0539 24.3584C23.48 24.3517 23.8343 24.004 23.8308 23.5955C23.828 23.187 23.4681 22.8447 23.0419 22.844C22.6052 22.844 22.2403 23.2012 22.2516 23.6198C22.2622 24.0276 22.6285 24.3652 23.0539 24.3584ZM25.4093 14.5868C25.4537 14.2304 25.2142 13.884 24.8359 13.7841C24.712 13.751 24.5767 13.7483 24.4464 13.7483C18.8848 13.7463 13.3238 13.7456 7.76281 13.7517C7.53178 13.7523 7.37471 13.6828 7.21623 13.5295C5.84201 12.2028 4.46075 10.8822 3.0816 9.56094C2.63433 9.13289 2.16733 9.08293 1.81445 9.42254C1.46156 9.76214 1.5158 10.2071 1.96377 10.6358C3.45491 12.0651 4.94887 13.4911 6.43368 14.9258C6.6802 15.1641 6.95139 15.2674 7.30075 15.2667C10.1555 15.26 13.011 15.2627 15.8665 15.2627H24.4056C24.4936 15.2627 24.5817 15.2667 24.669 15.2606C25.0529 15.233 25.3642 14.9487 25.4093 14.5868ZM7.29723 15.3005C6.93378 15.3005 6.65978 15.1925 6.40832 14.9494C5.30528 13.8833 4.1783 12.8044 3.08864 11.7613C2.70547 11.394 2.32159 11.0274 1.93841 10.6601C1.47987 10.2213 1.42423 9.74999 1.78909 9.39891C1.94968 9.24429 2.13211 9.16597 2.33215 9.16597H2.33286C2.58502 9.16597 2.85198 9.29426 3.10625 9.53731L3.81907 10.2206C4.94183 11.2961 6.10333 12.4081 7.24088 13.5066C7.39654 13.6571 7.54658 13.7186 7.75929 13.7186H7.76281C13.4478 13.7125 19.1411 13.7132 24.4464 13.7152C24.5781 13.7152 24.7176 13.7179 24.8451 13.7523C25.2332 13.855 25.491 14.2155 25.4438 14.5916C25.3966 14.9703 25.0719 15.266 24.6711 15.2951C24.607 15.2998 24.5422 15.2985 24.4802 15.2978C24.4556 15.2978 24.4302 15.2978 24.4056 15.2978H13.9626C11.7791 15.2971 9.52091 15.2964 7.30075 15.3018H7.29723V15.3005ZM2.33356 9.23349H2.33286C2.15254 9.23349 1.98631 9.30573 1.8398 9.44684C1.501 9.77294 1.55594 10.1976 1.98913 10.6122C2.3723 10.9795 2.75548 11.3467 3.13936 11.7134C4.22901 12.7572 5.356 13.8361 6.45903 14.9021C6.6957 15.131 6.9542 15.233 7.29793 15.233H7.30146C9.52162 15.2276 11.7798 15.2282 13.9633 15.2289H24.4063C24.4316 15.2289 24.457 15.2289 24.4823 15.2296C24.5436 15.2303 24.6063 15.2309 24.6676 15.2269C25.0346 15.2006 25.3325 14.9298 25.3755 14.5828C25.4184 14.2398 25.1825 13.9103 24.8275 13.8165C24.7077 13.7847 24.5739 13.782 24.4471 13.782C19.1418 13.78 13.4485 13.7793 7.76352 13.7854C7.52967 13.7841 7.36273 13.7186 7.19157 13.5532C6.05402 12.4554 4.89323 11.3434 3.76977 10.2678L3.05695 9.58457C2.81676 9.35435 2.56671 9.23282 2.33356 9.23282V9.23349Z" fill="currentColor" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap sm:hidden" id="textSidebarMini">Your Patients</span>
                </a>
            </li>
            @endif
            {{-- Disable for now
            <li>
                <a href="{{ route('assessment') }}" class="flex justify-center p-2 text-black rounded-lg hover:bg-blue-600 group {{ Str::contains(Route::currentRouteName(), 'assessment') ? 'bg-blue-600' : '' }}" id="navLink">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-black transition duration-75 group-hover:text-white {{ Str::contains(Route::currentRouteName(), 'assessment') ? 'text-white' : '' }}" id="navIcon" viewBox="0 0 16 16">
                        <path fill="currentColor" d="m.427 1.927l1.215 1.215a8.002 8.002 0 1 1-1.6 5.685a.75.75 0 1 1 1.493-.154a6.5 6.5 0 1 0 1.18-4.458l1.358 1.358A.25.25 0 0 1 3.896 6H.25A.25.25 0 0 1 0 5.75V2.104a.25.25 0 0 1 .427-.177M7.75 4a.75.75 0 0 1 .75.75v2.992l2.028.812a.75.75 0 0 1-.557 1.392l-2.5-1A.751.751 0 0 1 7 8.25v-3.5A.75.75 0 0 1 7.75 4" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap sm:hidden" id="textSidebarMini">Assessment History</span>
                </a>
            </li>
            --}}
            <li>
                <a href="{{ route('appointment') }}" class="flex justify-center p-2 text-black rounded-lg hover:bg-blue-600 group {{ Str::contains(Route::currentRouteName(), 'appointment') ? 'bg-blue-600' : '' }}" id="navLink">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-black transition duration-75 group-hover:text-white {{ Str::contains(Route::currentRouteName(), 'appointment') ? 'text-white' : '' }}" viewBox="0 0 45 45">
                        <g fill="none" stroke="currentColor" stroke-width="4">
                            <circle cx="24" cy="11" r="7" stroke-linecap="round" stroke-linejoin="round" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 41c0-8.837 8.059-16 18-16" />
                            <circle cx="34" cy="34" r="9" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M33 31v4h4" />
                        </g>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap sm:hidden text-black" id="textSidebarMini">Your Appointments</span>
                </a>
            </li>
            {{--@if (Auth::guard('doctors')->check() || Auth::guard('admins')->check())
            <li>
                <a href="{{ route('question') }}" class="flex justify-center p-2 text-black rounded-lg hover:bg-blue-600 group {{ Str::contains(Route::currentRouteName(), 'question') ? 'bg-blue-600' : '' }}" id="navLink">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-black transition duration-75 group-hover:text-white {{ Str::contains(Route::currentRouteName(), 'question') ? 'text-white' : '' }}" viewBox="0 0 32 32">
                        <path fill="currentColor" d="M28.5 32a3.476 3.476 0 0 1-2.475-1.025l-4.128-4.128a6.496 6.496 0 0 1-7.348-8.956l.588-1.34l4.156 4.156a1.023 1.023 0 0 0 1.414 0a.999.999 0 0 0 0-1.414l-4.156-4.157l1.34-.588a6.497 6.497 0 0 1 8.956 7.349l4.128 4.128A3.5 3.5 0 0 1 28.5 32m-6.03-7.409l4.97 4.97a1.535 1.535 0 0 0 2.12 0a1.499 1.499 0 0 0 0-2.121l-4.969-4.97l.188-.583A4.496 4.496 0 0 0 20.5 16q-.126 0-.25.007l1.872 1.872a3 3 0 0 1 0 4.242a3.072 3.072 0 0 1-4.243 0l-1.872-1.872Q16 20.374 16 20.5a4.497 4.497 0 0 0 5.888 4.28Z" />
                        <path fill="currentColor" d="M25 5h-3V4a2.006 2.006 0 0 0-2-2h-8a2.006 2.006 0 0 0-2 2v1H7a2.006 2.006 0 0 0-2 2v21a2.006 2.006 0 0 0 2 2h7v-2H7V7h3v3h12V7h3v5h2V7a2.006 2.006 0 0 0-2-2m-5 3h-8V4h8Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap sm:hidden text-black" id="textSidebarMini">Assessment Questions</span>
                </a>
            </li>
            @endif Disable for now--}}
            <li>
                <a href="{{ route('profile') }}" class="flex justify-center p-2 text-black rounded-lg hover:bg-blue-600 group {{ Str::contains(Route::currentRouteName(), 'profile') ? 'bg-blue-600' : '' }}" id="navLink">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-black font-bold transition duration-75 group-hover:text-white {{ Str::contains(Route::currentRouteName(), 'profile') ? 'text-white' : '' }}" id="navIcon" viewBox="0 0 16 16">
                        <g fill="none">
                            <g clip-path="url(#gravityUiGear0)">
                                <path fill="currentColor" fill-rule="evenodd" d="M7.199 2H8.8a.2.2 0 0 1 .2.2c0 1.808 1.958 2.939 3.524 2.034a.199.199 0 0 1 .271.073l.802 1.388a.199.199 0 0 1-.073.272c-1.566.904-1.566 3.164 0 4.069a.199.199 0 0 1 .073.271l-.802 1.388a.199.199 0 0 1-.271.073C10.958 10.863 9 11.993 9 13.8a.2.2 0 0 1-.199.2H7.2a.199.199 0 0 1-.2-.2c0-1.808-1.958-2.938-3.524-2.034a.199.199 0 0 1-.272-.073l-.8-1.388a.199.199 0 0 1 .072-.271c1.566-.905 1.566-3.165 0-4.07a.199.199 0 0 1-.073-.271l.801-1.388a.199.199 0 0 1 .272-.073C5.042 5.138 7 4.007 7 2.2c0-.11.089-.199.199-.199ZM5.5 2.2c0-.94.76-1.7 1.699-1.7H8.8c.94 0 1.7.76 1.7 1.7a.85.85 0 0 0 1.274.735a1.699 1.699 0 0 1 2.32.622l.802 1.388c.469.813.19 1.851-.622 2.32a.85.85 0 0 0 0 1.472a1.7 1.7 0 0 1 .622 2.32l-.802 1.388a1.699 1.699 0 0 1-2.32.622a.85.85 0 0 0-1.274.735c0 .939-.76 1.7-1.699 1.7H7.2a1.7 1.7 0 0 1-1.699-1.7a.85.85 0 0 0-1.274-.735a1.698 1.698 0 0 1-2.32-.622l-.802-1.388a1.699 1.699 0 0 1 .622-2.32a.85.85 0 0 0 0-1.471a1.699 1.699 0 0 1-.622-2.321l.801-1.388a1.699 1.699 0 0 1 2.32-.622A.85.85 0 0 0 5.5 2.2m4 5.8a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0M11 8a3 3 0 1 1-6 0a3 3 0 0 1 6 0" clip-rule="evenodd" />
                            </g>
                            <defs>
                                <clipPath id="gravityUiGear0">
                                    <path fill="currentColor" d="M0 0h16v16H0z" />
                                </clipPath>
                            </defs>
                        </g>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap sm:hidden" id="textSidebarMini">Your Profile</span>
                </a>
            </li>
        </ul>
        <div class="absolute bottom-0 pb-5 font-medium">
            <form method="POST" action="{{ route('logout') }}" class="flex justify-center p-2 text-black rounded-lg hover:bg-blue-600 group">
                @csrf
                <button type="submit" class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="flex-shrink-0 w-5 h-5 text-black font-bold transition duration-75 group-hover:text-white">
                        <path fill-rule="evenodd" d="M17 4.25A2.25 2.25 0 0 0 14.75 2h-5.5A2.25 2.25 0 0 0 7 4.25v2a.75.75 0 0 0 1.5 0v-2a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 .75.75v11.5a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1-.75-.75v-2a.75.75 0 0 0-1.5 0v2A2.25 2.25 0 0 0 9.25 18h5.5A2.25 2.25 0 0 0 17 15.75V4.25Z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M14 10a.75.75 0 0 0-.75-.75H3.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 14 10Z" clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap sm:hidden" id="textSidebarMini">Sign Out</span>
                </button>
            </form>
        </div>
    </div>
</aside>
<script src="{{ asset('js/navbar.js') }}"></script>