<?php if(!isset($_POST['submit'])): ?>

<div class="container text-left">
    <div class="row">
        <form class="form-horizontal" action="contato" method="post">
            <fieldset>
                <legend>Entre em contato com a XPTO</legend>
                <div class="control-group">
                    <label class="control-label" for="inputNome">Nome</label>
                    <div class="controls">
                        <input type="text" id="inputNome" placeholder="Nome" name="nome">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">Email</label>
                    <div class="controls">
                        <input type="text" id="inputEmail" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputAssunto">Assunto</label>
                    <div class="controls">
                        <input type="text" id="inputAssunto" placeholder="Assunto" name="assunto">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputMensagem">Mensagem</label>
                    <div class="controls">
                        <textarea rows="4" id="inputMensagem" placeholder="Mensagem" class="input-xxlarge" name="mensagem"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" class="btn btn-primary" name="submit" value="Enviar"/>
                        <button type="reset" class="btn">Limpar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<?php else: ?>
    <div class="container">
        <div class="row">
            <h2>Dados enviados pelo formulário de contato:</h2>
            <br />
            <strong>Nome:</strong><p class="text-info"><?php echo $_POST['nome']; ?> </p>
            <strong>Email:</strong><p class="text-info"><?php echo $_POST['email']; ?> </p>
            <strong>Assunto:</strong><p class="text-info"><?php echo $_POST['assunto']; ?> </p>
            <strong>Mensagem:</strong><em><p class="text-info"><?php echo $_POST['mensagem']; ?> </p></em>
            <p><a class="btn btn-success" href="contato" title="">Voltar ao formulário »</a></p>
        </div>
    </div>
<?php endif; ?>

