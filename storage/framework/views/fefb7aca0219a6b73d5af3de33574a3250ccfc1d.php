<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<?php if(isset($good)): ?>
    <?php echo e(Form::model($good, array('route'=>array('editgood',$good->id), 'method'=>'post','files' => true))); ?>

<?php else: ?>
    <?php echo e(Form::open(['route' => 'creategood','method'=>'post','files' => true])); ?>

<?php endif; ?>


    <table>
        <tr>
            <td>
                <label for="">Name:</label>
            </td>
            <td>
                <?php echo e(Form::text('name', Input::old('name'))); ?>

            </td>
        </tr>
        <tr>
            <td>
                <label for="">Price:</label>
            </td>
            <td>
                <?php echo e(Form::number('price', Input::old('price'),['step'=>'0.01'])); ?>(bel.rub.)

            </td>
        </tr>
        <tr>
            <td>
                <label for="">Count:</label>
            </td>
            <td>
                <?php echo e(Form::number('count', Input::old('count'))); ?>(1-100)
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Description:</label>
            </td>
            <td>

                <?php echo e(Form::textarea('description',old('description'))); ?>

            </td>
        </tr>
        <tr>
            <td>
                <label for="">Image:</label>
            </td>
            <td>
                <?php if(isset($good)): ?>
                    <img src="<?php echo e(URL::asset('static/images/goods/'.$good->image)); ?>" width="150px" alt="">
                    <?php endif; ?>
                <?php echo e(Form::file('image')); ?>

               (jpeg,jpg,png,gif, max 2MB)

            </td>
        </tr>
        <tr>
            <td>
                <label for="">Active:</label>
            </td>
            <td>

                <?php echo e(Form::hidden('active',false)); ?>

                <?php echo e(Form::checkbox('active',true)); ?>


            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Send">
            </td>
        </tr>
    </table>
<?php echo e(Form::close()); ?>