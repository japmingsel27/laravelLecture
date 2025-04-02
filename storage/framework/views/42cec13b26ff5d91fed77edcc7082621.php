<html>
    <head></head>
    <body>
            <?php if($errors->any()): ?>
               <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul> 
            <?php endif; ?>
        <form method="POST" action="<?php echo e(route('register.student')); ?>">
            <?php echo csrf_field(); ?>
            <input type="text" name="fname" placeholder="First Name">
            <input type="text" name="mname" placeholder="Middle Name">
            <input type="text" name="lname" placeholder="Last Name">
            <input type="text" name="sname" placeholder="Suffix">
            <label>Gender</label>
            <input type="radio" name="gender" value="M">Male
            <input type="radio" name="gender" value="F">Female
            <input type="date" name="bdate" placeholder="Birth Date">
            <button type="submit">Submit</button>
        </form>

        <table border="1">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($student->studno); ?></td>
                        <td><?php echo e($student->lname); ?>, <?php echo e($student->fname); ?> <?php echo e($student->mname); ?> <?php echo e($student->sname); ?></td>
                        <td><?php echo e($student->gender); ?></td>
                        <td><?php echo e($student->bdate); ?></td>
                        <td>
                            <a href="<?php echo e(route('update.student',['id'=>$student->studno])); ?>" style="background:yellow;">Update</a>
                            <a href="<?php echo e(route('delete.student', ['id'=>$student->studno])); ?>" style="background:red;">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </body>
</html><?php /**PATH C:\xampp\htdocs\apiSample\resources\views/students/add_students.blade.php ENDPATH**/ ?>