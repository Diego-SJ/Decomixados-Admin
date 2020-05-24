<div class="content">
    <section class="content-header">
      <?php 
        if(!empty($this->session->flashdata("success"))){
        echo '<span class="text-success"><b>'.
        $this->session->flashdata("success")
                    .'</b></span>';
        } else if(!empty($this->session->flashdata("error"))){
        echo '<span class="text-danger"><b>'.
                    $this->session->flashdata("error")
                    .'</b></span>';
        }?>
    </section>

    <section class="content">
        <h2>MIS MENSAJES</h2>
        <div class="row">
            <div class="col-lg-12">
                <table id="" class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">Fecha</th>
                            <th scope="col" class="text-center">Nombre</th>
                            <th scope="col" class="text-center">Correo</th>
                            <th scope="col" class="text-center">Asunto</th>
                            <th scope="col" class="text-center">Mensaje</th>
                            <th scope="col" class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                  <?php if(!empty($messages)): ?>
                  <?php $i = 1; ?>
                  <?php foreach($messages as $m): ?>
                        <tr>
                            <td class="text-center"><?= $m->date ?></td>
                            <td class="text-center"><?= $m->name ?></td>
                            <td class="text-center"><?= $m->email ?></td>
                            <td class="text-center"><?= $m->subject ?></td>
                            <td class="text-center"><?= $m->message ?></td>
                            <td class="text-center">
                                <a class="btn btn-danger" href="<?= base_url().'messages/delete?idmessage='.$m->idmessage; ?>">eliminar</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                  <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center"><strong>No hay mensajes</strong></td>
                    </tr>
                  <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<script>
    $(function(){
        $('#li_messages').attr('class','active nav-link btn btn-primary text-white');
    })
</script>