<div class="font-lex bg-gradient-to-tl from-gray-50 via-orange-50 to-cyan-50 py-16 bg-cover bg-center"
     style="background-image: url('../../../images/network/ab-bg1.jpg');">
    <x-slot name="header">Tree view</x-slot>
    {{-- border-t-2 border-blue-600 --}}
    <div
        class="bg-white/70 w-9/12 mx-auto h-[40rem] flex  justify-center  rounded-md shadow-md shadow-gray-300 bg-cover ">
        <div class="w-5/12  flex-col flex justify-center items-center px-5">

            <div class="w-full my-12 flex ">
{{--                <x-input.search-bar label="Search here...."/>--}}
            </div>

            <div class="w-11/12 h-8 bg-orange-600 flex text-white text-sm justify-evenly items-center font-semibold">
                <div>ID : USER001</div>
                <div>NAME : USERName1</div>
            </div>
            <div class="w-11/12 max-h-[25rem]  overflow-y-auto text-white">
                <x-table.form>
                    <x-slot:table_header name="table_header">

                        <x-table.header-serial width="20%"/>

                        <x-table.header-text sortIcon="none">
                            Members
                        </x-table.header-text>

                        <x-table.header-text sortIcon="none">
                            Member ID
                        </x-table.header-text>

                        <x-table.header-text sortIcon="none">
                            Node
                        </x-table.header-text>


                        <x-table.header-text width="20%" sortIcon="none">
                            Amount
                        </x-table.header-text>


                    </x-slot:table_header>

                    <!-- Table Body ------------------------------------------------------------------------------------------->

                    <x-slot:table_body name="table_body">
                        @foreach($user_data as $index => $user)
                            <x-table.row>
                                <x-table.cell-text>{{ $index+1 }}</x-table.cell-text>
                                <x-table.cell-text>{{$user->name}}</x-table.cell-text>
                                <x-table.cell-text>{{$user->username}}</x-table.cell-text>
                                <x-table.cell-text>{{$user->position}}</x-table.cell-text>
                                <x-table.cell-text>{{1500}}</x-table.cell-text>
                            </x-table.row>
                        @endforeach

                    </x-slot:table_body>
                </x-table.form>

            </div>
            <div class="w-11/12 h-8 bg-blue-600 flex text-white text-sm justify-evenly items-center font-semibold">
                <div class="w-[80%] text-center">Total</div>
                <div class="w-[20%] text-center">50000</div>
            </div>
        </div>

        <div class="w-7/12 flex-col flex justify-center items-center rounded-md">
            <div class="flex justify-center items-center">
                <div class="tree">
                    <div class="text-xl pb-8 text-tangerine underline underline-offset-4 font-semibold ">Network Tree
                    </div>
                    @foreach ($user_data as $user)
                        @include('livewire.tree-node', ['user' => $user])
                    @endforeach
                </div>
                {{--                <x-livewire.network.items.user-card :list="$user"/>--}}
            </div>
        </div>
    </div>

    <div>


        <style>
            .tree {
                margin: 20px;
            }

            .node {
                margin-left: 20px;
                position: relative;
            }

            .node::before {
                content: '';
                position: absolute;
                left: -10px;
                top: -1px;
                border-left: 2px solid darkorange;
                height: 100%;
            }

            .node::after {
                content: '';
                position: absolute;
                left: -9px;
                top: 24px;
                border-top: 1px solid #374151;
                width: 20px;
            }
        </style>

    </div>
</div>
