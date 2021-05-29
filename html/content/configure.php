<form action="php/configure.php" method="post">
    <div class="row">
        <div class="col-2">
            <select name="name" class="form-control">

                <option value="0" selected> Usuario </option>
                <?php
                
                    $user = new Database();
                
                    $res = $user->readUsers();
                
                    while ($users = mysqli_fetch_assoc($res)) {
                        echo "<option value=\"" . $users['id'] . "\">". $users['name'] . "</option>";
                    }
                
                ?>
            </select>
        </div>
        <div class="col-2">
            <select name="id_rol" class="form-control">
                <option value="0" selected> Rol </option>
                <?php
                    $res2 = $user->readRoles();
                    while ($roles = mysqli_fetch_assoc($res2)) {
                        $selected = $roles['id_rol'] == 2 ? 'selected' : '';
                        echo "<option value=\"" . $roles['id_rol'] . "\">". $roles['descripcion'] . "</option>";
                    }
                ?>
            </select>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </div>
</form>

