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
                <form style="align-items: center;justify-content: center; display: flex" method="GET" action="{{route('deletebyyear')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer col-xs-5 col-sm-5 col-md-5">
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
                                    if (selectedCategory === "Best Researcher (Senior)" || selectedCategory === "Best Young Researcher" || selectedCategory === "Best Researcher at Faculty Level") {
                                        $("#guidelineA").show();
                                    } else {
                                        $("#guidelineA").hide();
                                    }
                                }
                                toggleNumCitInput();
                                $("#categorySelect").change(function() {
                                    toggleNumCitInput();
                                });
                            });
                        </script>
                        <div style="margin-bottom: 10px" id="guidelineA" class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
                            <a href="#" class="form-group">
                                <strong style="color:#0048ff;">Click to Download Guidelines A</strong>
                            </a>
                        </div>


                        <script>
                            $(document).ready(function() {
                                // Function to show/hide the "Number of Citations" input based on category selection
                                function toggleNumCitInput() {
                                    var selectedCategory = $("#categorySelect").val();
                                    if (selectedCategory === "Most Cited Researcher") {
                                        $("#guidelineB").show();
                                    } else {
                                        $("#guidelineB").hide();
                                    }
                                }
                                toggleNumCitInput();
                                $("#categorySelect").change(function() {
                                    toggleNumCitInput();
                                });
                            });
                        </script>
                        <div style="margin-bottom: 10px" id="guidelineB" class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
                            <a href="#" class="form-group">
                                <strong style="color:#0048ff;">Click to Download Guidelines B</strong>
                            </a>
                        </div>

                        <script>
                            $(document).ready(function() {
                                // Function to show/hide the "Number of Citations" input based on category selection
                                function toggleNumCitInput() {
                                    var selectedCategory = $("#categorySelect").val();
                                    if (selectedCategory === "Recipient of Highest Number of Research Grant") {
                                        $("#guidelineC").show();
                                    } else {
                                        $("#guidelineC").hide();
                                    }
                                }
                                toggleNumCitInput();
                                $("#categorySelect").change(function() {
                                    toggleNumCitInput();
                                });
                            });
                        </script>
                        <div style="margin-bottom: 10px" id="guidelineC" class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
                            <a href="#" class="form-group">
                                <strong style="color:#0048ff;">Click to Download Guidelines C</strong>
                            </a>
                        </div>

                        <script>
                            $(document).ready(function() {
                                // Function to show/hide the "Number of Citations" input based on category selection
                                function toggleNumCitInput() {
                                    var selectedCategory = $("#categorySelect").val();
                                    if (selectedCategory === "Recipient of Highest Number of Patents or University Best Inventor") {
                                        $("#guidelineD").show();
                                    } else {
                                        $("#guidelineD").hide();
                                    }
                                }
                                toggleNumCitInput();
                                $("#categorySelect").change(function() {
                                    toggleNumCitInput();
                                });
                            });
                        </script>
                        <div style="margin-bottom: 10px" id="guidelineD" class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
                            <a href="#" class="form-group">
                                <strong style="color:#0048ff;">Click to Download Guidelines C</strong>
                            </a>
                        </div>



                        <script>
                            $(document).ready(function() {
                                // Function to show/hide the "Number of Citations" input based on category selection
                                function toggleNumCitInput() {
                                    var selectedCategory = $("#categorySelect").val();
                                    if (selectedCategory === "Best Researcher at Faculty Level") {
                                        $("#faculty").show();
                                    } else {
                                        $("#faculty").hide();
                                    }
                                }
                                toggleNumCitInput();
                                $("#categorySelect").change(function() {
                                    toggleNumCitInput();
                                });
                            });
                        </script>
                        <div id="faculty" class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
                            <div class="form-group">
                                <strong>Faculty</strong>
                                <select name="faculty" class="custom-select" id="inputGroupSelect04" >
                                    <option></option>
                                    <option value="Faculty of Computing">Faculty of Computing</option>
                                    <option value="Faculty of Agriculture Sciences">Faculty of Agriculture Sciences</option>
                                    <option value="Faculty of Applied Sciences">Faculty of Applied Sciences</option>
                                    <option value="Faculty of Geomatics">Faculty of Geomatics</option>
                                    <option value="Faculty of Sports">Faculty of Sports</option>
                                    <option value="Faculty of Management Studies">Faculty of Management Studies</option>
                                    <option value="Faculty of Medicine">Faculty of Medicine</option>
                                    <option value="Faculty of Social Sciences and Languages">Faculty of Social Sciences and Languages</option>
                                    <option value="Faculty of Technology">Faculty of Technology</option>
                                    <option value="Faculty of Graduate Studies">Faculty of Graduate Studies</option>
                                    <option value="Centre for Indigenous Knowledge and Community Studies (CIKCS)">Centre for Indigenous Knowledge and Community Studies (CIKCS)</option>
                                    <option value="Centre for Open and Distance learning(CODL)">Centre for Open and Distance learning(CODL)</option>
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
                                toggleNumCitInput();
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

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input style="display: none" type="text" value="{{ Auth::user()->email }}"  name="email" class="form-control" placeholder="email">
                            </div>
                        </div>


                        <div  class="col-xs-12 col-sm-12 col-md-12">
                            <button class="welcomebutton" type="submit">Submit</button>
                        </div>

                    </form>
                </div>

            @endif

            @if(checkPermission(['admin','reviewer']))
                <div style="padding: 50px">
                    <form action="{{ route('getSubByFormRequest') }}" id="selectform" method="GET">
                        @csrf
                        <div class="form-group">
                            <strong>Select a category:</strong>
                            <select name="category" id="categorySelect" required>
                                <option value="" selected disabled>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                                <div class="my-2">
                                    <input required type="text" name="year" class="form-control" placeholder="YYYY">
                                </div>
                            <script>
                                $(document).ready(function() {
                                    // Function to show/hide the "Number of Citations" input based on category selection
                                    function toggleNumCitInput() {
                                        var selectedCategory = $("#categorySelect").val();
                                        if (selectedCategory === "Best Researcher at Faculty Level") {
                                            $("#faculty").show();
                                        } else {
                                            $("#faculty").hide();
                                        }
                                    }
                                    toggleNumCitInput();
                                    $("#categorySelect").change(function() {
                                        toggleNumCitInput();
                                    });
                                });
                            </script>
                            <div id="faculty" class="" style="display: none;">
                                <div class="form-group">
                                    <strong>Faculty</strong>
                                    <select name="faculty" class="custom-select" id="inputGroupSelect04" >
                                        <option></option>
                                        <option value="Faculty of Computing">Faculty of Computing</option>
                                        <option value="Faculty of Agriculture Sciences">Faculty of Agriculture Sciences</option>
                                        <option value="Faculty of Applied Sciences">Faculty of Applied Sciences</option>
                                        <option value="Faculty of Geomatics">Faculty of Geomatics</option>
                                        <option value="Faculty of Sports">Faculty of Sports</option>
                                        <option value="Faculty of Management Studies">Faculty of Management Studies</option>
                                        <option value="Faculty of Medicine">Faculty of Medicine</option>
                                        <option value="Faculty of Social Sciences and Languages">Faculty of Social Sciences and Languages</option>
                                        <option value="Faculty of Technology">Faculty of Technology</option>
                                        <option value="Faculty of Graduate Studies">Faculty of Graduate Studies</option>
                                        <option value="Centre for Indigenous Knowledge and Community Studies (CIKCS)">Centre for Indigenous Knowledge and Community Studies (CIKCS)</option>
                                        <option value="Centre for Open and Distance learning(CODL)">Centre for Open and Distance learning(CODL)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>

                    </form>
                </div>

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
                                <th>Faculty</th>
                                <th>Year</th>
                                <th>Marks</th>
                                <th>Reviewer</th>
                                @if(checkPermission(['admin']))
                                    <th>Select</th>
                                @endif
                                @if(checkPermission(['reviewer']))
                                    <th>Marks</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @if(checkPermission(['admin']))
                                @foreach ($submissions as $submission)
                                    <tr>

                                        <td>{{ $submission->authorName }}</td>
                                        <td>{{ $submission->category }}</td>
                                        <td><a href="{{ asset('submissions/' . $submission->file) }}" target="_blank">{{ $submission->file }}</a></td>
                                        <td><a href="{{ asset('approvalLetters/' . $submission->approvalLetter) }}" target="_blank">{{ $submission->approvalLetter }}</a></td>
                                        <td>{{ $submission->gSLink }}</td>
                                        <td>{{ $submission->numCit }}</td>
                                        <td>{{ $submission->faculty }}</td>
                                        <td>{{ $submission->year }}</td>
                                        <td>{{ $submission->marks }}</td>
                                        <td>{{ $submission->reviewer }}</td>
                                        @if(checkPermission(['admin']))
                                            <form action="{{ route('submission.update',$submission->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <td>
                                                    <select name="email" id="categorySelect" required>
                                                        <option value="" selected disabled>Select a reviewer</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->email }}" >{{ $user->email }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td>
                                                    <button type="submit" class="btn btn-danger">Update</button>
                                                </td>
                                            </form>
                                        @endif

                                    </tr>
                                @endforeach
                            @endif
                            @if(checkPermission(['reviewer']))
                                @foreach ($submissions as $submission)
                                    @if($submission->reviewer == Auth::user()->email)
                                        <tr>

                                            <td>{{ $submission->authorName }}</td>
                                            <td>{{ $submission->category }}</td>
                                            <td><a href="{{ asset('submissions/' . $submission->file) }}" target="_blank">{{ $submission->file }}</a></td>
                                            <td><a href="{{ asset('approvalLetters/' . $submission->approvalLetter) }}" target="_blank">{{ $submission->approvalLetter }}</a></td>
                                            <td>{{ $submission->gSLink }}</td>
                                            <td>{{ $submission->numCit }}</td>
                                            <td>{{ $submission->faculty }}</td>
                                            <td>{{ $submission->year }}</td>
                                            <td>{{ $submission->marks }}</td>
                                            <td>{{ $submission->reviewer }}</td>

                                            @if(checkPermission(['reviewer']))
                                                <form action="{{ route('submission.update',$submission->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <td>
                                                        <input value="{{$submission->marks}}"  name="marks" class="form-control" />
                                                    </td>

                                                    <td>
                                                        <button type="submit" class="btn btn-danger">Update</button>
                                                    </td>
                                                </form>
                                            @endif
                                        </tr>
                                    @endif

                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>

                @endif
            @endif


            @if(checkPermission(['user']))

                    @if (count($submissions) > 0)

                        <div style="padding: 50px">
                            <h2>Submissions</h2>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    {{--                                <th>Author Name</th>--}}
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Evaluation File</th>
                                    <th>Approval Letter</th>
{{--                                    <th>Google Scholar</th>--}}
{{--                                    <th>Citations</th>--}}
{{--                                    <th>Year</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($submissions as $submission)
                                    @if ($submission->authorName == Auth::user()->name)
                                    <tr>

                                        {{--                                    <td>{{ $submission->authorName }}</td>--}}
                                        <td>{{ $submission->updated_at }}</td>
                                        <td>{{ $submission->category }}</td>
                                        <td><a href="{{ asset('submissions/' . $submission->file) }}" target="_blank">{{ $submission->file }}</a></td>
                                        <td><a href="{{ asset('approvalLetters/' . $submission->approvalLetter) }}" target="_blank">{{ $submission->approvalLetter }}</a></td>
{{--                                        <td>{{ $submission->gSLink }}</td>--}}
{{--                                        <td>{{ $submission->numCit }}</td>--}}
{{--                                        <td>{{ $submission->year }}</td>--}}
                                    </tr>
                                    @endif

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    @endif
                @endif


    </div>
@endsection
