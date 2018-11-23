<?php $__env->startSection('title', 'Almacen'); ?>



<?php $__env->startSection('cont_principal'); ?>

<form action="/processart" method="POST">
	<?php echo csrf_field(); ?>
  <div class="form-group">
    <label for="nombre">Nombre del artículo</label>
    <input type="text" name = "nombre" class="form-control" id="nombre"
        placeholder="Ejem. Tornillos de 3 1/2" value="<?php if( old('nombre') != null ): ?><?php echo e(old('nombre')); ?><?php elseif(isset($edit_articulo) && count($edit_articulo) == 1): ?><?php echo e($edit_articulo[0]['nombre_art']); ?><?php endif; ?>">
  </div>
  <div class="form-group">
    <label for="cantidad">Cantidad</label>
    <select class="form-control" id="cantidad" name="cantidad">
      <option value="" selected="selected">Seleccione</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="existencia">Existencia</label>
    <input type="text" name = "existencia" class="form-control" id="existencia" placeholder="Ejm. 12" value="<?php if( old('existencia') != null ): ?><?php echo e(old('existencia')); ?> <?php elseif(isset($edit_articulo) && count($edit_articulo) == 1): ?><?php echo e($edit_articulo[0]['exis_art']); ?> <?php endif; ?>">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripción</label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?php if( old('descripcion') != null ): ?><?php echo e(old('descripcion')); ?><?php elseif(isset($edit_articulo) && count($edit_articulo) == 1): ?><?php echo e($edit_articulo[0]['desc_art']); ?><?php endif; ?></textarea>
  </div>
  <div class="form-group">
        <?php if(isset($edit_articulo) && count($edit_articulo) == 1): ?>
            <button type="submit" id="updatearticulo" name="updatearticulo" class="btn btn-warning">Actualizar</button>
            <button type="button" id="cancelar" name="cancelar" class="btn btn-secondary">Cancelar</button>
        <?php else: ?>
            <button type="submit" name="nuevoarticulo" class="btn btn-info">Agregar</button>
        <?php endif; ?>
  </div>

    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

  <?php if($errors->any()): ?>
  <div class="form-group">
      <div class="alert alert-danger">
          <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
  </div>
  <?php endif; ?>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Artículo</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Existencia</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
        <?php if( isset($articulos) && count($articulos) >= 1): ?>
            <?php $__currentLoopData = $articulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($art['id_art']); ?></th>
                <td><?php echo e($art['nombre_art']); ?></td>
                <td><?php echo e($art['cant_art']); ?></td>
                <td><?php echo e($art['exis_art']); ?></td>
                <td><?php echo e($art['desc_art']); ?></td>
                <td class="text-center columna-accion">
                    <span>
                        <img class="update-icon" src="<?php echo e(asset('svg/iconic/svg/pencil.svg')); ?>" width="20" heigth="20" title="Editar">
                    </span>
                    <span>
                        <img class="trash-icon" src="<?php echo e(asset('svg/iconic/svg/trash.svg')); ?>" width="20" heigth="20" title="Eliminar">
                    </span>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    </tbody>
  </table>



</form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/frmalmacen.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.almacen', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>