<?php $row = $this->obj->viewUser($_GET['id']); ?>



<input type="hidden" class="form-control" id="id" value="<?= $row['id']; ?>">
<div class="row">
    <div class="col-sm-6">
        <label for="name">Student Name </label>
        <input type="text" class="form-control" id="name" value="<?= $row['name']; ?>">
    </div>
    <div class="col-sm-6">
        <label for="fname">Father’s Name</label>
        <input type="text" class="form-control" id="fname" value="<?= $row['fname']; ?>">
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <label for="dob">Student DOB </label>
        <input type="text" class="form-control" id="dob" value="<?= $row['dob']; ?>">
    </div>
    <div class="col-sm-6">
        <label for="Address">Address</label>
        <input type="text" class="form-control" id="Address" value="<?= $row['address']; ?>">
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <label for="City">City</label>
        <input type="text" class="form-control" id="City" value="<?= $row['city']; ?>">
    </div>
    <div class="col-sm-6">
        <label for="State">State</label>
        <input type="text" class="form-control" id="State" value="<?= $row['state']; ?>">
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <label for="Pin">Pin</label>
        <input type="text" class="form-control" id="Pin" value="<?= $row['pin']; ?>">
    </div>
    <div class="col-sm-6">
        <label for="pnumber">Phone Number</label>
        <input type="text" class="form-control" id="pnumber" value="<?= $row['pnumber']; ?>">
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <label for="email">Email ID</label>
        <input type="email" class="form-control" id="email" value="<?= $row['email']; ?>">
    </div>
    <div class="col-sm-6">
        <label for="Class">Class</label>
        <input type="text" class="form-control" id="Class" value="<?= $row['class']; ?>">
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <label for="Marks">Marks</label>
        <input type="text" class="form-control" id="Marks" value="<?= $row['marks']; ?>">
    </div>
    <div class="col-sm-6">
        <label for="denroll">Date enrolled </label>
        <input type="text" class="form-control" id="denroll" readonly value="<?= $row['denroll']; ?>">
    </div>
</div>
<br>
<button type="button" class="btn btn-primary" onclick="updateStud()">Update Data</button>


</div>
<script>
    function updateStud() {
        var id = $('#id').val();
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

        $.post("index.php?c=teacher&f=updateData", {
                id: id,
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
                    window.location.href = "index.php?c=teacher&f=dashbord";
                }else {
                    alert(response.message);
                }

            });
    }
</script>