<div class="container">
    <?php if(!empty($noticias) && is_array($noticias)): ?>
        <?php foreach($noticias as $noticias_item): ?>
            <div class="card my-5">
                <div class="card-body">
                    <h3><?=$noticias_item['titulo']?></h3>
                    <p><?=$noticias_item['descricao']?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class= "btn btn-success">Saiba mais</a>
                    <a href="#" class= "btn btn-warning">Editar</a>
                    <a href="#" class= "btn btn-danger">Excuir</a>
                </div>

            </div>

        <?php endforeach;?>
    <?php else: ?>
        <h3>Sem Notícias</h3> 
        <p>Não existe notícia cadastrada no Sistema</p>       
    <?php endif; ?>        
</div>