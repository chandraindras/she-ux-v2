<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SheUX</title>
  <!-- base:css -->

</head>

<body >
  @include('sweetalert::alert')
  <div class="container-scroller">
    <div class="container-fluid">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mt-3">
            <div class="col-md-9 mt-6 grid-margin stretch-card">
              <div class="card card-swot" style="margin-left: 1.5rem;">
                <div class="row">
                <div class="col-md-12">
                  <center>
                  <div class="table-responsive table-content">
                      <table class="">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($listComparison as $key => $data) 
                          @php
                            if ( $i == 1 ) {
                          @endphp
                        <thead>
                          <tr>
                            <th style="min-width: 60px; max-width: 100px;" class="call-tooltip bottom">
                              Aspect
                            </th>
                            <th style="width: 60px; ">
                              {{ $data->competitor1 }}
                            </th>
                            <th style="width: 60px; ">
                              {{ $data->competitor2 }}
                            </th>
                            <th style="width: 60px; ">
                              {{ $data->competitor3 }}
                            </th>
                          </tr>
                        </thead>
                        @php
                            } else if ($i > 1) {
                              $j = 0;
                              $j = $j + 1;
                          @endphp
                        <tbody>
                          <tr>
                            <td>
                              {{ $data->aspect }}
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
                          </tr>
                        </tbody>
                        @php
                            }
                            $i = $i + 1;
                          @endphp
                          @endforeach
                      </table>   
                      </form>
                  </div>
                </center>
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
