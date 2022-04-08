<?php
use MapasCulturais\i;
?>
<section class="section-box">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-half">
            
                    <h1 class="title has-text-centered color-white"><? i::_e("Caixa de Comunicação", 'FormCommunication')?></h1>
                    <?php if(isset($_SESSION['form_communication_mess']) && $_SESSION['form_communication_mess']['type']!= ''): ?>
                    <div class="alert <?=$_SESSION['form_communication_mess']['type']?>" style="display: inline-block;"><?=$_SESSION['form_communication_mess']['menssage']?></div>
                    <?php unset($_SESSION['form_communication_mess']) ?>
                    <?php endif; ?>

                    <form action="<?=$url?>" method="POST">
                        <div class="field">
                            <label class="label"><? i::_e("Nome*", 'FormCommunication')?></label>
                            <div class="control">
                                <input name="nome" class="input" type="text" placeholder="Digite seu nome" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label"><? i::_e("E-mail*", 'FormCommunication')?></label>
                            <div class="control">
                                <input name="email" class="input" type="email" placeholder="Digite seu e-mail" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label"><? i::_e("Telefone", 'FormCommunication')?></label>
                            <div class="control">
                                <input name="tel" class="input" type="tel" pattern="\([0-9]{2}\)[9]{1}[0-9]{4}-[0-9]{4}" placeholder="(xx)9xxxx-xxxx">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label"><? i::_e("Cidade", 'FormCommunication')?></label>
                            <div class="control">
                                <input name="cidade" class="input" type="text" placeholder="Digite sua cidade">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label"><? i::_e("Mensagem*", 'FormCommunication')?></label>
                            <div class="control">
                                <textarea name="mensagem" class="textarea" cols="35" placeholder="Digite sua mensagem" maxlength="3000" required></textarea>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button-submit"><? i::_e("Enviar", 'FormCommunication')?></button>

                            </div>


                        </div>
                    </form>
            </div>
        </div>
    </section>