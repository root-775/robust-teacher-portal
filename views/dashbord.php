<div class="container-fluid mt-3">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
        New Student
    </button>
    <table class="table table-responsive" id="example">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Father’s Name</th>
                <th scope="col">Student DOB</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Pin</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email ID</th>
                <th scope="col">Class</th>
                <th scope="col">Marks</th>
                <th scope="col">Date enrolled</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="tbody">
            <?php foreach ($this->obj->showallData() as $row) { ?>
                <tr>
                    <th scope="row"><?= $row['id'] ?></th>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['fname'] ?></td>
                    <td><?= $row['dob'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td><?= $row['state'] ?></td>
                    <td><?= $row['pin'] ?></td>
                    <td><?= $row['pnumber'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['class'] ?></td>
                    <td><?= $row['marks'] ?></td>
                    <td><?= $row['denroll'] ?></td>
                    <td>
                        <a href="index.php?c=teacher&f=edit&id=<?= $row['id'] ?>"><i class="fas fa-edit text-success"></i></a>
                        <form action="index.php?c=teacher&f=delete" method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button><i class="fas fa-trash-alt text-danger"></i></button>
                        </form>
                        <a href="&id="></a>
                    </td>

                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>







<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-6">
                        <label for="name">Student Name </label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="col-sm-6">
                        <label for="fname">Father’s Name</label>
                        <input type="text" class="form-control" id="fname">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="dob">Student DOB </label>
                        <input type="date" class="form-control" id="dob">
                    </div>
                    <div class="col-sm-6">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="City">City</label>
                        <input type="text" class="form-control" id="City">
                    </div>
                    <div class="col-sm-6">
                        <label for="State">State</label>
                        <input type="text" class="form-control" id="State">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="Pin">Pin</label>
                        <input type="text" class="form-control" id="Pin">
                    </div>
                    <div class="col-sm-6">
                        <label for="pnumber">Phone Number</label>
                        <input type="text" class="form-control" id="pnumber">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="email">Email ID</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="col-sm-6">
                        <label for="Class">Class</label>
                        <input type="text" class="form-control" id="Class">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="Marks">Marks</label>
                        <input type="text" class="form-control" id="Marks">
                    </div>
                    <div class="col-sm-6">
                        <label for="denroll">Date enrolled </label>
                        <input type="text" class="form-control" id="denroll" readonly value="<?= date('m-d-Y') ?>">
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addStud()">Save Data</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "pagingType": "full_numbers"
        });
    });




    function addStud() {
        var name = $('#name').val();
        var fname = $('#fname').val();
        var dob = $('#dob').val();
        var Address = $('#Address').val();
        var State = $('#State').val();
        var City = $('#City').val();
        var Pin = $('#Pin').val();
        var pnumber = $('#pnumber').val();
        var email = $('#email').val();
        var Class = $('#Class').val();
        var Marks = $('#Marks').val();
        var denroll = $('#denroll').val();

        $.post("index.php?c=teacher&f=saveData", {
                name: name,
                fname: fname,
                dob: dob,
                address: Address,
                city: City,
                state: State,
                pin: Pin,
                pnumber: pnumber,
                email: email,
                class: Class,
                marks: Marks,
                denroll: denroll
            })
            .done(function(data) {
                let response = JSON.parse(data);
                if(response.status == true){
                    location.reload();
                }else {
                    alert(response.message);
                }

            });


    }
</script>