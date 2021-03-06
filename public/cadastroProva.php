<?php require_once "../controllers/dbController.php";
      require_once "../templates/headerTemplate.php"; ?>

      <h1>Cadastro de provas</h1>

      <form id="cadProva" method="post" onsubmit="cadProva(); return false;" action="">

        <!-- CPF -->
        <div class="form-input">
          <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
          <input type="text" name="cpf" maxlength="11" pattern=".{11}" title="No mínimo 11 caracteres" required="true" placeholder="CPF do dono da prova"
          onblur="validaCampo('input', 'cpf', '#query_validate_check', 'cadastroProvaCpfControllerUpdater');">
          <div id="query_validate_check"></div>
        </div>

        <br>

        <!-- PROCURAR QUESTAO -->
        <div class="form-input">
          <i class="fa fa-search" aria-hidden="true"></i>
          <input type="text" name="nome_questao" maxlength="50" placeholder="Pesquisar por..." />
        </div>

        <!-- DISCIPLINA -->
        <div class="form-input">
          <i class="fa fa-book" aria-hidden="true"></i>
          <select name="disciplina">
            <?php
              $disciplinas = $con->query("SELECT * FROM disciplinas");
              foreach($disciplinas as $disciplina) {
                echo "<option>" . utf8_encode($disciplina[0]) . "</option>";
              }
            ?>
          </select>
          <select name="dificuldade">
            <option>Fácil</option>
            <option>Médio</option>
            <option>Difícil</option>
          </select>
          <select name="ano">
            <option>1 ano</option>
            <option>2 ano</option>
            <option>3 ano</option>
          </select>

          <input type="button" value="Pesquisar Questão" onclick="getQuestaoProva();" />
        </div>
        <div id="query_table"></div>

        <br>

        <!-- CADASTRO -->
        <input type="submit" name="cadastrar" value="Cadastrar Prova">

      </form>

      <div id="questoes_adicionadas">
        <h4>Questões a serem adicionadas</h4>
        <ul>
        </ul>
      </div>

      <div id="resultado_query"></div>

<?php require_once "../templates/footerTemplate.php" ?>
