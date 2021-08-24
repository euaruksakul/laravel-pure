<x-app-layout>
    <x-slot name="header1">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project details') }}<br>
            {{ $projectDetail -> name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table>
                        <tr>
                            <th>Project ID: </td>
                            <td>{{ $projectDetail -> id }}</td>
                        </tr>
                        <tr>
                            <th>Project name: </td>
                            <td>{{ $projectDetail -> name }}</td>
                        </tr>
                        <tr>
                            <th>Type: </td>
                            <td>{{ $projectDetail -> type }}</td>
                        </tr>
                        <tr>
                            <th>Description: </td>
                            <td>{{ $projectDetail -> description }}</td>
                        </tr>
                        <tr>
                            <th>Project start date: </td>
                            <td>{{ $projectDetail -> start_date }}</td>
                        </tr>
                        <tr>
                            <th>Project end date: </td>
                            <td>{{ $projectDetail -> end_date }}</td>
                        </tr>
                        
                        
                    </table>
                    <br>
                    <h2>Project member</h2>
                    <table>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Action</th>
                        </tr>
                        @foreach($projectMembers as $projectMember)
                            <tr>
                                <td>{{ $projectMember -> firstname }}</td>
                                <td>{{ $projectMember -> lastname }}</td>
                                <td>Delete user</td>
                            </tr>
                        @endforeach
                    </table>
                    <br>
                    <form>
                        <div class="form-group">
                            <h3>Add members..</h3>
                            <x-label for="searchString" :value="__('Name search')" />
                            <x-input id="searchString"  name="searchString" class="block mt-1 w-full" type="text"/>
                        </div>
                        <div class="form-group flex items-center justify-end mt-4">
                            <x-button class="ml-4 btn-submit" name="button_nameSearch" id="button_nameSearch">
                                {{ __('search') }}
                            </x-button>
                        </div>  
                    </form>
                    <br>

                    <h3>Search results:</h3>
                    <div class="row" id="SearchResults">
                        <!--display search result here (from jQuery .ajax)-->
                    </div>
                    

                </div>
                <a href="{{ route('projects.edit',$projectDetail -> id) }}">Edit project detail</a>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#button_nameSearch").click(function(e){

        e.preventDefault();

        var searchString = $("#searchString").val();
        console.log(searchString);
        
        $.ajax({
        type: "POST",
        url:"{{ route('ajaxRequest.post') }}",
        data:{searchString:searchString},
        success:function(htmlResult){
            console.log(htmlResult);

            $("#SearchResults").html(htmlResult);
        }
        });
    });
</script>