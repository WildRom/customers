<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/dt-1.10.23/datatables.min.css" />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
    rel="stylesheet" />
  <script src="js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/ju/dt-1.10.23/datatables.min.js"></script>
  <title>@yield('title')</title>
</head>

<body>
  <!-- *************************** NAV ********************************* -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="#">Charts</a>
        </div>
      </div>
      <div class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success btn-task me-2" type="button" data-bs-toggle="modal"
          data-bs-target="#addWorkModal"><span class="fas fa-pen me-1"></span>New Task</button>

        <button class="btn btn-outline-success btn-task" type="button">All Tasks</button>
      </div>
    </div>
  </nav>

  <!-- ****************************** END NAV ******************************* -->
  <!-- ****************************** TABLE ******************************* -->

  <div class="container-fluid">
    <div class="row">
      <div class="">
        <table id="myTable"
          class="table table-sm table-strip table-bordered table-hover table-condensed table-responsive mt-2">
          <thead class="table-light">
            <th>Vardas</th>
            <th>Tel.Nr.</th>
            <th>Gaminys</th>
            <th>Atlikti</th>
            <th>Komentaras</th>
            <th>Priimtas</th>
            <th>Atiduotas</th>
            <th>Kaina</th>
            <th>B??sena</th>
            <th>Change</th>
          </thead>
          <tbody>
            @foreach ($customers as $customer)
            <tr>
              <td>{{ $customer->name }}</td>
              <td>{{ $customer->tel_num }}</td>
              <td>{{ $customer->model }}</td>
              <td>{{ $customer->todo }}</td>
              <td>{{ $customer->comment }}</td>
              <td>{{ date('Y-m-d', strtotime($customer->added_at)) }}</td>

              @if ($customer->finished_at)
              <td>{{ date('Y-m-d', strtotime($customer->finished_at)) }}</td>
              @else
              <td>&nbsp;</td>
              @endif

              <td>{{ $customer->price }}</td>
              <td>
                @if ($customer->ready)
                <?php $wcolor = 'green'; ?>
                {{-- @{{ $wcolor = 'green'}} --}}
                @else
                <?php $wcolor = 'red'; ?>
                {{-- @{{ $wcolor = 'red'}} --}}
                @endif
                <span class="fas fa-wrench {{ $wcolor }}" aria-hidden="true"></span>

                @if ($customer->paid)
                <?php $pcolor = 'green'; ?>
                @else
                <?php $pcolor = 'red'; ?>
                @endif
                <span class="fas fa-coins {{ $pcolor }}" aria-hidden="true"></span>
              </td>
              <td>
                <a href="/edit/{{$customer->id}}">
                  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editTask">
                    Change
                  </button>
                </a>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ****************************** END TABLE ******************************* -->
  <!-- ****************************** MODAL ADD NEW WORK**************************** -->

  <div class="modal fade" id="addWorkModal" tabindex="-1" aria-labelledby="addWorkModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addWorkModalTitle">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="\add" method="POST" id="add">
          <div class="modal-body">
            @csrf
            <div class="mb-2">
              {{-- <label for="name" class="form-label">Customer name</label> --}}
              <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="mb-2">
              {{-- <label for="tel_num" class="form-label">Phone Nr.</label> --}}
              <input type="text" class="form-control" id="tel_num" name="tel_num" placeholder="Phone">
            </div>
            <div class="mb-2">
              {{-- <label for="model" class="form-label">Model</label> --}}
              <input type="text" class="form-control" id="model" name="model" placeholder="Model">
            </div>
            <div class="mb-2">
              {{-- <label for="todo">To Do</label> --}}
              <textarea class="form-control" placeholder="What to do ..." id="todo" name="todo"></textarea>
            </div>
            <div class="mb-2">
              {{-- <label for="comment">Comment</label> --}}
              <textarea class="form-control" placeholder="Comment ..." id="comment" name="comment"></textarea>
            </div>
            <div class="mb-2">
              {{-- <label for="price" class="form-label">Price</label> --}}
              <input type="number" class="form-control" id="price" name="price" placeholder="Price">
            </div>
            <div class="mb-2">
              <label for="cost" class="form-label">Cost</label>
              <input type="number" class="form-control" id="cost" name="cost" value=0>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- ****************************** END MODAL ADD NEW WORK**************************** -->
  <!-- ****** -->
  <!-- ****** -->
  <!-- ****** -->
  <!-- ****** -->
  <!-- ****************************** MODAL EDIT TASK **************************** -->

  <div class="modal fade" id="editTask" tabindex="-1" aria-labelledby="editTask" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editTaskTitle">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST">
          <div class="modal-body">
            <div class="mb-2">
              <label for="name" class="form-label">Customer name</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-2">
              <label for="phone" class="form-label">Phone Nr.</label>
              <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="mb-2">
              <label for="model" class="form-label">Model</label>
              <input type="text" class="form-control" id="model" name="model">
            </div>
            <div class="mb-2">
              <label for="todo">To Do</label>
              <textarea class="form-control" id="todo" name="todo"></textarea>
            </div>
            <div class="mb-2">
              <label for="comment">Comment</label>
              <textarea class="form-control" id="comment" name="comment">Something</textarea>
            </div>
            <div class="mb-2">
              <label for="price" class="form-label">Price</label>
              <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="mb-2">
              <label for="cost" class="form-label">Cost</label>
              <input type="number" class="form-control" id="cost" name="cost">
            </div>

            <!-- ******* check boxes ****** -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="finished">
              <label class="form-check-label" for="finished">
                Finished
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="paid">
              <label class="form-check-label" for="paid">
                Paid
              </label>
            </div>
          </div><!-- END MODAL BODY -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- ****************************** END MODAL EDIT TASK**************************** -->



  <!-- Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready( function () {
          $('#add').submit( function(e) {
            e.preventDefault();

            let name = $('#name').val();
            let tel_num = $('#tel_num').val();
            let model = $('#model').val();
            let todo = $('#todo').val();
            let comment = $('#comment').val();
            let price = $('#price').val();
            let cost = $('#cost').val();
            let _token = $('input[name=_token]').val();

            $.ajax({
              url: "{{ route('customer.add') }}",
              type: "POST",
              data: {
                name: name,
                tel_num: tel_num,
                model: model,
                todo: todo,
                comment: comment,
                price: price,
                cost: cost,
                _token: _token
              },
              success: function(response) {
                if(response) {
                  let html = '';
                  html += '<tr><td>';
                  html += response.name;
                  html += '</td><td>';
                  html += response.tel_num;
                  html += '</td><td>';
                  html += response.model;
                  html += '</td><td>';
                  html += response.todo;
                  html += '</td><td>';
                  html += response.comment;
                  html += '</td><td>';
                  html += response.added_at;
                  html += '</td><td>';
                  html += response.finished_at;
                  html += '</td><td>';
                  html += response.price;
                  html += '</td><td>';
                  html += response.cost;
                  html += '</td><td>';
                  html += 'change';
                  html += '</td></tr>';
                  console.log(html);
                  $('#myTable tbody').append(html);
                  
                  $('#add')[0].reset;
                  $('#addWorkModal').modal('hide');
                } else {
                  alert('WRONG, NO RESPONSE!!!');
                }
              }
            })            
          });
    });
  </script>
</body>

</html>