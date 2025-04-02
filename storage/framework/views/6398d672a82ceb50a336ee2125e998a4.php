<form method="POST" action="<?php echo e(route('register.student')); ?>">
    <?php echo csrf_field(); ?>
    <input type="text" name="fname" placeholder="First Name" value="<?php echo e($student->fname); ?>">
    <input type="text" name="mname" placeholder="Middle Name" value="<?php echo e($student->mname); ?>">
    <input type="text" name="lname" placeholder="Last Name" value="<?php echo e($student->lname); ?>">
    <input type="text" name="sname" placeholder="Suffix" value="<?php echo e($student->sname); ?>">
    <label>Gender</label>
    <input type="radio" name="gender" value="M">Male
    <input type="radio" name="gender" value="F">Female
    <input type="date" name="bdate" placeholder="Birth Date" value="<?php echo e($student->bdate); ?>">
    <button type="submit">Submit</button>
</form><?php /**PATH C:\xampp\htdocs\apiSample\resources\views/students/updateStudents.blade.php ENDPATH**/ ?>