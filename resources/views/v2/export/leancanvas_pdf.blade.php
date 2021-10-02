<!DOCTYPE html>
<html lang="en">


<style type="text/css">
    body{
        overflow: auto;
    }
    .table-content {
        padding: 20px;
    }
    .remove {
        color: #9F4949;
        /*position: relative;
        left: -5rem;*/
        margin-left: -1rem;
        margin-top: -2rem;
    }
    .remove:hover {
        cursor: pointer;
    }
    .form-control {
        width: 120px;
    }
    .table-position {
        position: absolute;
        top: 80px;
        left: 100px;
    }
    .th-style{
        width: 250px;
        height: 50px;
    }
</style>
<body style="  background: #f4f7fa;">
@include('sweetalert::alert')
<div class="container-scroller">
    <div class="container-fluid">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row mt-3">
                    <div class="col-md-9 mt-6 grid-margin stretch-card">
                        <div class="card card-swot" style="margin-left: 1.5rem;">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-nav">
                                        <div class="wrapper-nav stretch-nav">
                                            <div class="ml-3" style="margin-top: 15px;">

                                                <span class=""><a href="{{ url('/home') }}" style="text-decoration: none;" class="nav-title">Dashboard</a></span>
                                                <img class="ml-2" src="{{asset('modalDocument/right.svg')}}">

                                                <span class="ml-1"><a href="{{ url('/detail-project', $projectName['id']) }}" style="text-decoration: none;" class="nav-title">{{ $projectName['project_name'] }}</a></span>

                                                <img class="ml-2 ml-1" src="{{asset('modalDocument/right.svg')}}">
                                                <span class="nav-document-name ml-1"><input class="component-name" type="text" name="comparison_name" value="{{ $dataComparison['comparison_name'] }}"></span>
                                                <img class="ml-2" src="{{asset('modalDocument/right.svg')}}">
                                                <a type="button" href="{{ route('cetak-lean-canvas', $dataComparison['id_project']) }}"><img class="ml-2 mb-1" src="{{asset('modalDocument/export.svg')}}"></a>
                                                @foreach ($dataProject as $list)
                                                    <a type="button" data-toggle="modal" data-target="#inviteMember-{{$list->id}}" class="color-primary"><img class="ml-2 example-css-selector-3" src="{{asset('modalDocument/add member.svg')}}"></a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive table-content">

                                        <!-- <input name="Col1" type="checkbox" checked="checked" /> -->
                                        <!-- <button type="button" class="btn btn-link hide-column" data-column="#column-a" name="add" id="btnHide" style="margin-top: -1.5rem; margin-left: -1.5rem;"><img src="{{asset('modalDocument/add-row.svg')}}"></button> -->
                                            <table class="demo-table table-hideable">
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @foreach ($listComparison as $key => $data)
                                                    @php
                                                        if ( $i == 1 ) {
                                                    @endphp
                                                    <thead>
                                                    <tr>
                                                        <input type="hidden" name="updatemore[{{ $key }}][id_project]" value="{{ $projectName['id'] }}" class="form-control" />
                                                        <input type="hidden" name="updatemore[{{ $key }}][comparison_name]" value="Comparison Matrix" class="form-control" />
                                                        <input type="hidden" name="updatemore[{{ $key }}][id_comparison]" value="{{$data->id_comparison}}">
                                                        <th class="call-tooltip bottom">
                                                            {{ $data->aspect }}

                                                        </th>
                                                        <th>
                                                            <input type="text" class="competitor" name="updatemore[{{ $key }}][competitor1]" placeholder="Competitor Name" value="{{ $data->competitor1 }}" required>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="competitor" name="updatemore[{{ $key }}][competitor2]" placeholder="Competitor Name" value="{{ $data->competitor2 }}" required>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="competitor" name="updatemore[{{ $key }}][competitor3]"  placeholder="Competitor Name" value="{{ $data->competitor3 }}" required>
                                                        </th>
                                                    <!-- <th id="column-a">
                              <input type="text" class="competitor" name="updatemore[{{ $key }}][competitor4]"  placeholder="Competitor Name" value="{{ $data->competitor4 }}" id="competitor4Id" disabled>
                            </th>
                            <th id="column-b">
                              <input type="text" class="competitor" name="updatemore[{{ $key }}][competitor5]"  placeholder="Competitor Name" value="{{ $data->competitor5 }}" id="competitor5Id" disabled>
                            </th> -->
                                                    </tr>
                                                    </thead>
                                                    @php
                                                        } else if ($i > 1) {
                                                          $j = 0;
                                                          $j = $j + 1;
                                                    @endphp
                                                    <tbody>
                                                    <tr>
                                                    <!-- <input type="hidden" name="updatemore[{{ $key }}][id_project]" value="{{ $projectName['id'] }}" class="form-control" />
                            <input type="hidden" name="updatemore[{{ $key }}][comparison_name]" value="Comparison Matrix" class="form-control" /> -->
                                                        <input type="hidden" name="updatemore[{{ $key }}][id_comparison]" value="{{$data->id_comparison}}">
                                                        <input type="hidden" class="serdelete_val_id" value="{{$data->id_comparison}}">
                                                        <td>
                                                            <a type="button" class="servideletebtn"><span class="remove">x</span></a><input type="text" class="mt-1 aspect" name="updatemore[{{ $key }}][aspect]" placeholder="Aspect/Feature" value="{{ $data->aspect }}" required>
                                                        </td>
                                                        <td>
                                                            <select id="emoji" name="updatemore[{{ $key }}][competitor1]">
                                                                @php
                                                                    if($data->competitor1 == "✔") {
                                                                @endphp
                                                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                                                @php
                                                                    } else{
                                                                @endphp
                                                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                                                @php
                                                                    }
                                                                @endphp
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select id="emoji" name="updatemore[{{ $key }}][competitor2]">
                                                                @php
                                                                    if($data->competitor2 == "✔") {
                                                                @endphp
                                                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                                                @php
                                                                    } else{
                                                                @endphp
                                                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                                                @php
                                                                    }
                                                                @endphp
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select id="emoji" name="updatemore[{{ $key }}][competitor3]">
                                                                @php
                                                                    if($data->competitor3 == "✔") {
                                                                @endphp
                                                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                                                @php
                                                                    } else{
                                                                @endphp
                                                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                                                @php
                                                                    }
                                                                @endphp
                                                            </select>
                                                        </td>
                                                    <!-- <td id="column-a">
                              <select id="emoji" name="updatemore[{{ $key }}][competitor4]" disabled>
                                @php
                                                        if($data->competitor4 == "✔") {
                                                    @endphp
                                                        <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                  <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                @php
                                                        } else{
                                                    @endphp
                                                        <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                @php
                                                        }
                                                    @endphp
                                                        </select>
                                                      </td> -->
                                                    <!--  <td>
                               <select id="emoji" class="" name="updatemore[{{ $key }}][competitor5]" disabled>
                                @php
                                                        if($data->competitor5 == "✔") {
                                                    @endphp
                                                        <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                  <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                @php
                                                        } else{
                                                    @endphp
                                                        <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                @php
                                                        }
                                                    @endphp
                                                        </select>
                                                       </td> -->
                                                    </tr>
                                                    </tbody>
                                                    @php
                                                        }
                                                        $i = $i + 1;
                                                    @endphp
                                                @endforeach
                                            </table>

                                            <div class="mt-3 btn-save"><button for="update_data" name="submit" type="submit" class="save-style">Update</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



</body>

</html>
