@extends('layouts.app')

@section('content')
    <div class="">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if(checkPermission(['admin']))
            <a class="welcomebutton" href={{url('edit-records')}} aria-expanded="false" v-pre>
                Users
            </a>
            <a class="welcomebutton" href={{ route('category.index') }} aria-expanded="false" v-pre>
                Categories
            </a>
                <form method="GET" action="{{route('deletebyyear')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-xs-10 col-sm-10 col-md-10">
                                <div class="form-group">
                                    <input required type="text" name="year" class="form-control" placeholder="YYYY">
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2" style="display: inline-flex;justify-content: center">
                                <button type="submit" class="btn btn-success btn-user float-right mb-3">Delete</button>
                            </div>
                        </div>

                    </div>
                </form>
        @endif
            @if(checkPermission(['user']))
                <div class="dropdown-container">
                    <form action="{{ route('submission.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Select the category:</strong>
                                <select name="category" id="categorySelect" required>
                                    <option value="" selected disabled>Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                // Function to show/hide the "Number of Citations" input based on category selection
                                function toggleNumCitInput() {
                                    var selectedCategory = $("#categorySelect").val();
                                    if (selectedCategory !== "Most Cited Researcher") {
                                        $("#evfile").show();
                                    } else {
                                        $("#evfile").hide();
                                    }
                                }

                                // Initially hide/show based on the selected category on page load
                                toggleNumCitInput();

                                // Attach an event handler to the category select element
                                $("#categorySelect").change(function() {
                                    toggleNumCitInput();
                                });
                            });
                        </script>
                        <div id="evfile" class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
                            <div class="form-group">
                                <strong>Upload the evaluation form:</strong>
                                <input type="file" name="file">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Upload the Dean and Head approval:</strong>
                                <input type="file" name="approvalLetter" required>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                // Function to show/hide the "Number of Citations" input based on category selection
                                function toggleNumCitInput() {
                                    var selectedCategory = $("#categorySelect").val();
                                    if (selectedCategory === "Most Cited Researcher") {
                                        $("#gSDiv").show();
                                    } else {
                                        $("#gSDiv").hide();
                                    }
                                }

                                // Initially hide/show based on the selected category on page load
                                toggleNumCitInput();

                                // Attach an event handler to the category select element
                                $("#categorySelect").change(function() {
                                    toggleNumCitInput();
                                });
                            });
                        </script>

                        <div id="gSDiv" class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
                            <div class="form-group">
                                <strong>Google Scholar Link:</strong>
                                <input type="text" name="gSLink" class="form-control" placeholder="Google Scholar Link">
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                // Function to show/hide the "Number of Citations" input based on category selection
                                function toggleNumCitInput() {
                                    var selectedCategory = $("#categorySelect").val();
                                    if (selectedCategory === "Most Cited Researcher") {
                                        $("#numCitDiv").show();
                                    } else {
                                        $("#numCitDiv").hide();
                                    }
                                }

                                // Initially hide/show based on the selected category on page load
                                toggleNumCitInput();

                                // Attach an event handler to the category select element
                                $("#categorySelect").change(function() {
                                    toggleNumCitInput();
                                });
                            });
                        </script>

                        <div id="numCitDiv" class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
                            <div class="form-group">
                                <strong>Number of Citations:</strong>
                                <input type="text" name="numCit" class="form-control" placeholder="Number of citations">
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                // Function to show/hide the "Number of Citations" input based on category selection
                                function toggleNumCitInput() {
                                    var selectedCategory = $("#categorySelect").val();
                                    if (selectedCategory === "Most Outstanding Artist award") {
                                        $("#hardCopy").show();
                                    } else {
                                        $("#hardCopy").hide();
                                    }
                                }

                                // Initially hide/show based on the selected category on page load
                                toggleNumCitInput();

                                // Attach an event handler to the category select element
                                $("#categorySelect").change(function() {
                                    toggleNumCitInput();
                                });
                            });
                        </script>

                        <div id="hardCopy" class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
                            <div class="form-group">
                                <strong style="color:#ff0000;">For the Most Outstanding Artist award need to submit the hard copy also.</strong>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input style="display: none" type="text" value="{{ Auth::user()->name }}"  name="authorName" class="form-control" placeholder="NIC">
                            </div>
                        </div>
                        <div  class="col-xs-12 col-sm-12 col-md-12">
                            <button class="welcomebutton" type="submit">Submit</button>
                        </div>

                    </form>
                </div>

            @endif

            @if(checkPermission(['admin','reviewer']))
                @if (count($submissions) > 0)
                    <div style="padding: 50px">
                        <h2>Submissions</h2>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Author Name</th>
                                <th>Category</th>
                                <th>Evaluation File</th>
                                <th>Approval Letter</th>
                                <th>Google Scholar</th>
                                <th>Citations</th>
                                <th>Year</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($submissions as $submission)
                                <tr>

                                    <td>{{ $submission->authorName }}</td>
                                    <td>{{ $submission->category }}</td>
                                    <td><a href="{{ asset('submissions/' . $submission->file) }}" target="_blank">{{ $submission->file }}</a></td>
                                    <td><a href="{{ asset('submissions/' . $submission->approvalLetter) }}" target="_blank">{{ $submission->file }}</a></td>
                                    <td>{{ $submission->gSLink }}</td>
                                    <td>{{ $submission->numCit }}</td>
                                    <td>{{ $submission->year }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif
            @endif

    </div>
@endsection
