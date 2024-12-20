<x-app-layout>

    <div class="space-y-10 font-lex">
        <x-slot name="header">Dashboard</x-slot>

        <div class="relative flex overflow-x-hidden bg-purple-400 my-4 space-x-8">
            @for( $i=1; $i<=50; $i++)
                <div class="py-2 animate-marquee whitespace-nowrap text-white text-sm space-x-1">
                    <span class=" ">Your</span>
                    <span class=" ">ID</span>
                    <span class=" ">is</span>
                    <span class=" ">Inactive.</span>
                    <span class=" ">Please</span>
                    <span class=" ">activate</span>
                    <span class=" ">your</span>
                    <span class=" ">ID.</span>
                </div>
            @endfor
        </div>

        <div class="flex justify-between h-96 gap-5">
            <div class="w-4/12 h-full gap-y-3 p-5 rounded-md border-gray-300 border flex-col flex justify-between">
                <div class="w-full h-full p-5 border border-gray-300 text-sm rounded-md flex-col flex justify-between">
                    <div class="border-b border-gray-300 space-x-3"><span>User ID:</span><span
                            class="font-bold text-sm text-orange-600">{{$users->username}}</span></div>
                    <div class="border-b border-gray-300 space-x-3"><span>{{$users->name}}</span><span
                            class="font-bold text-sm text-orange-600">DEMO</span>
                    </div>
                    <div class="border-b border-gray-300 space-x-3"><span>Referral ID:</span><span
                            class="font-bold text-sm text-orange-600">0</span></div>
                    <div class="border-b border-gray-300 space-x-3"><span>Total Topup:</span><span
                            class="font-bold text-sm text-orange-600">₹ 1800</span></div>
                    <div class="border-b border-gray-300 space-x-3"><span>Rewards:</span><span
                            class="font-bold text-sm text-orange-600">₹ 320</span></div>
                </div>
                <button class="w-full bg-orange-600 text-white text-sm font-semibold text-center pax-4 py-2 rounded-sm">
                    Earning Wallet: ₹ 427.50
                </button>
                <button class="w-full bg-orange-600 text-white text-sm font-semibold text-center pax-4 py-2 rounded-sm">
                    Topup Wallet: ₹ 1999.00
                </button>
            </div>
            <div class="w-8/12 h-full flex-col flex gap-2">
                <div class="font-semibold tracking-wider">ACCOUNT SUMMARY</div>
                <div class="grid grid-cols-3 gap-5 h-full">
                    <div
                        class="h-full bg-violet-400 text-white text-sm font-semibold rounded-md flex-col flex space-y-1.5 items-center justify-center">
                        <span>₹</span>
                        <span>TEAM BUSINESS</span>
                        <SPAN>₹ 10450</SPAN>
                    </div>
                    <div
                        class="h-full bg-sky-400 text-white text-sm font-semibold rounded-md flex-col flex space-y-1.5 items-center justify-center">
                        <span>₹</span>
                        <span>MY REFERRALS</span>
                        <SPAN>₹ 10450</SPAN>
                    </div>
                    <div
                        class="h-full bg-teal-400 text-white text-sm font-semibold rounded-md flex-col flex space-y-1.5 items-center justify-center">
                        <span>₹</span>
                        <span>TOTAL INCOME</span>
                        <SPAN>₹ 10450</SPAN>
                    </div>
                    <div
                        class="h-full bg-rose-400 text-white text-sm font-semibold rounded-md flex-col flex space-y-1.5 items-center justify-center">
                        <span>₹</span>
                        <span>LEVEL REWARD</span>
                        <SPAN>₹ 10450</SPAN>
                    </div>
                    <div
                        class="h-full bg-orange-400 text-white text-sm font-semibold rounded-md flex-col flex space-y-1.5 items-center justify-center">
                        <span>₹</span>
                        <span>DAILY MINING</span>
                        <SPAN>₹ 10450</SPAN>
                    </div>
                    <div
                        class="h-full bg-green-400 text-white text-sm font-semibold rounded-md flex-col flex space-y-1.5 items-center justify-center">
                        <span>₹</span>
                        <span>MY WITHDRAWALS</span>
                        <SPAN>₹ 10450</SPAN>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-5 my-5">
            <div class="h-96  overflow-y-auto p-5 border border-gray-300 rounded-md">

                <div class="text-lg font-semibold border-b border-gray-300 pb-2">Latest News</div>

                @foreach($blogPosts as $blogPost)

                    <div class="flex gap-x-5 my-3">
                        <div class="w-1/2">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url('/images/'.$blogPost->image) }}"
                                 alt=""
                                 class="w-full h-24 object-cover">
                        </div>

                        <div class="w-full space-y-2">

                            <a href="{{ route('blog-post.show', $blogPost->id) }}"
                               class="text-md uppercase tracking-wider font-merri line-clamp-2 text-gray-700 hover:text-orange-700
                                     transition-all duration-500 ease-in-out cursor-pointer">{{\Illuminate\Support\Str::words($blogPost->vname,8)}}
                            </a>

                            <div class="text-xs text-orange-700 just">{{ $blogPost->created_at->diffForHumans() }}</div>

                        </div>
                    </div>
                @endforeach

            </div>

            <div class="h-96 border border-gray-300 rounded-md flex-col flex justify-center  p-5">
                <div class="flex-col flex justify-center items-center gap-y-5 text-lg">
                    <div class="inline-flex items-center gap-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z"/>
                        </svg>
                        <span>Share Your Referral Link</span>
                    </div>
                    <div class="inline-flex items-center justify-center gap-x-3">
                        <svg width="40" height="40" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M85 45C85 22.9086 67.0914 5 45 5C22.9086 5 5 22.9086 5 45C5 64.9649 19.6273 81.5133 38.75 84.5141V56.5625H28.5938V45H38.75V36.1875C38.75 26.1625 44.7219 20.625 53.8586 20.625C58.2352 20.625 62.8125 21.4063 62.8125 21.4063V31.25H57.7687C52.8 31.25 51.25 34.3336 51.25 37.4969V45H62.3438L60.5703 56.5625H51.25V84.5141C70.3727 81.5133 85 64.9656 85 45Z"
                                fill="#1877F2"/>
                            <path
                                d="M60.5703 56.5625L62.3438 45H51.25V37.4969C51.25 34.3336 52.8 31.25 57.7687 31.25H62.8125V21.4062C62.8125 21.4062 58.2352 20.625 53.8586 20.625C44.7219 20.625 38.75 26.1625 38.75 36.1875V45H28.5938V56.5625H38.75V84.5141C40.7867 84.8336 42.8734 85 45 85C47.1266 85 49.2133 84.8336 51.25 84.5141V56.5625H60.5703Z"
                                fill="white"/>
                        </svg>
                        <svg width="40" height="40" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M73.0163 16.6252C65.533 9.13229 55.5802 5.0038 44.9756 5C23.1241 5 5.34024 22.7818 5.33264 44.6389C5.32884 51.626 7.15551 58.446 10.6245 64.4564L5 85L26.0152 79.4877C31.805 82.6469 38.3248 84.31 44.9586 84.312H44.9756C66.8234 84.312 84.6094 66.5282 84.6169 44.6711C84.6207 34.0782 80.5016 24.12 73.0163 16.6271V16.6252ZM44.9756 77.6174H44.9624C39.0508 77.6156 33.2516 76.0264 28.1917 73.0251L26.9885 72.3105L14.5173 75.5816L17.8456 63.4223L17.0625 62.1754C13.7646 56.9294 12.0215 50.8657 12.0254 44.6408C12.033 26.475 26.8136 11.6945 44.9891 11.6945C53.7897 11.6983 62.0621 15.1293 68.2833 21.3581C74.5047 27.5851 77.928 35.8649 77.9242 44.6674C77.9165 62.8351 63.136 77.6156 44.9756 77.6156V77.6174ZM63.0485 52.9415C62.0581 52.4454 57.1884 50.0503 56.2797 49.7197C55.3712 49.3888 54.7117 49.2236 54.052 50.2157C53.3925 51.2081 51.4936 53.4395 50.9157 54.099C50.3378 54.7605 49.76 54.8423 48.7696 54.346C47.7795 53.85 44.588 52.8046 40.8035 49.4306C37.8592 46.8037 35.8708 43.5612 35.2931 42.5688C34.7152 41.5767 35.2323 41.0406 35.7264 40.5484C36.1711 40.1036 36.7167 39.3908 37.2128 38.8129C37.7091 38.2351 37.8725 37.8208 38.2031 37.1611C38.534 36.4997 38.3686 35.922 38.1215 35.4257C37.8743 34.9297 35.8938 30.0541 35.0669 28.0716C34.2628 26.1405 33.4456 26.4028 32.8392 26.3705C32.2613 26.342 31.6018 26.3363 30.9403 26.3363C30.2788 26.3363 29.2066 26.5834 28.2981 27.5756C27.3896 28.5677 24.831 30.9646 24.831 35.8382C24.831 40.7118 28.3799 45.424 28.876 46.0854C29.3721 46.7469 35.8613 56.7507 45.7968 61.0426C48.1597 62.0633 50.0052 62.6734 51.4441 63.1297C53.8164 63.8843 55.9756 63.7779 57.6825 63.5231C59.5854 63.2381 63.5428 61.1262 64.3677 58.8129C65.1926 56.4997 65.1926 54.5152 64.9456 54.1028C64.6985 53.6903 64.037 53.4413 63.0467 52.9452L63.0485 52.9415Z"
                                  fill="#25D366"/>
                        </svg>
                        <svg width="40" height="40" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M79.3339 27.1022C79.3868 27.8681 79.3869 28.634 79.3869 29.4069C79.3869 52.9587 61.4574 80.121 28.6727 80.121V80.1069C18.988 80.121 9.5045 77.3469 1.35156 72.1163C2.7598 72.2857 4.17509 72.3704 5.59392 72.374C13.6198 72.381 21.4163 69.6881 27.7304 64.7292C20.1033 64.5845 13.4151 59.6116 11.0786 52.3516C13.7504 52.8669 16.5033 52.761 19.1257 52.0445C10.8104 50.3645 4.82803 43.0587 4.82803 34.574C4.82803 34.4963 4.82803 34.4222 4.82803 34.3481C7.30568 35.7281 10.0798 36.494 12.9174 36.5787C5.08568 31.3445 2.67156 20.9257 7.40097 12.7798C16.4504 23.9151 29.8021 30.6845 44.1351 31.401C42.6986 25.2104 44.661 18.7234 49.2916 14.3716C56.4704 7.62336 67.761 7.96925 74.5092 15.1445C78.501 14.3575 82.3269 12.8928 85.828 10.8175C84.4974 14.9434 81.7127 18.4481 77.9927 20.6751C81.5257 20.2587 84.9774 19.3128 88.228 17.8692C85.8351 21.4551 82.821 24.5787 79.3339 27.1022Z"
                                fill="#1D9BF0"/>
                        </svg>

                    </div>
                    <div class="w-full space-y-3 text-sm">
                        <div>Referral Link</div>
                        <div class="border-b border-gray-300"></div>
                        <div>Left Referral Link</div>

                        <div x-data="{ copied: false, color: 'text-blue-400' }">
                            <div :class="color"
                                 @click="
             $dispatch('copy-to-clipboard', '{{  route('user.register',[auth()->id(),'L']) }}');
             color = 'text-indigo-400';
             copied = true;
             setTimeout(() => { color = 'text-blue-400'; copied = false; }, 2000);
         "
                                 class="cursor-pointer">
                                {{ route('user.register',[auth()->id(),'L'])}}
                            </div>
                            <span x-show="copied" x-transition>Copied!</span>
                        </div>


                        <div class="border-b border-gray-300"></div>
                        <div>Right Referral Link</div>
                        <div x-data="{ copied: false, color: 'text-blue-400' }">
                            <div :class="color"
                                 @click="
             $dispatch('copy-to-clipboard', '{{  route('user.register',[auth()->id(),'R']) }}');
             color = 'text-indigo-400';
             copied = true;
             setTimeout(() => { color = 'text-blue-400'; copied = false; }, 2000);
         "
                                 class="cursor-pointer">
                                {{  route('user.register',[auth()->id(),'R']) }}
                            </div>
                            <span x-show="copied" x-transition>Copied!</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full h-96  flex-col flex justify-between border border-gray-300 rounded-md">
                <div class="w-full  flex items-center justify-center">
                    <span><x-web.dashboard.items.qrpage class="w-auto h-80 self-center "/></span>
                </div>
                <div class="">
                    <div class="w-full bg-gray-400 text-sm inline-flex items-center rounded-b-md">
                        <span class="w-4/6 py-3 text-center text-white font-semibold tracking-wider">xxxyyyzzzzxxxxyyyyzzzzyyyzzz012</span>
                        <button class="w-2/6 h-full bg-orange-500 text-white px-2 py-3">Copy Address</button>
                    </div>
                </div>
            </div>
            <div></div>
        </div>
    </div>
</x-app-layout>


<script>
    window.addEventListener('copy-to-clipboard', (event) => {
        const text = event.detail;
        const el = document.createElement('textarea');
        el.value = text;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
    });
</script>
