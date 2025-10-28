// Funções de JS para o Gerador de Currículos
(function () {
  // Calcula idade com base na data de nascimento e atualiza o display
  function calcularIdade() {
    var input = document.getElementById('data_nascimento');
    var display = document.getElementById('idadeDisplay');
    if (!input || !display) return;
    var val = input.value;
    if (!val) {
      display.textContent = 'Idade: —';
      return;
    }
    var hoje = new Date();
    var nasc = new Date(val + 'T00:00:00');
    var idade = hoje.getFullYear() - nasc.getFullYear();
    var m = hoje.getMonth() - nasc.getMonth();
    if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) {
      idade--;
    }
    if (isNaN(idade) || idade < 0) {
      display.textContent = 'Idade: —';
    } else {
      display.textContent = 'Idade: ' + idade;
    }
  }

  // Adiciona um bloco de experiência
  function adicionarExperiencia() {
    var container = document.getElementById('experiencias-container');
    if (!container) return;
    var html = '' +
      '<div class="repeatable-item card border-0 shadow-sm mb-3">' +
      '  <div class="card-body">' +
      '    <div class="d-flex justify-content-between align-items-center mb-2">' +
      '      <span class="fw-semibold">Experiência</span>' +
      '      <button type="button" class="btn btn-sm btn-outline-danger btn-remove" title="Remover">✕</button>' +
      '    </div>' +
      '    <div class="row g-3">' +
      '      <div class="col-12 col-md-6">' +
      '        <label class="form-label">Cargo</label>' +
      '        <input type="text" class="form-control" name="exp_cargo[]" placeholder="Ex.: Analista de Sistemas" required>' +
      '      </div>' +
      '      <div class="col-12 col-md-6">' +
      '        <label class="form-label">Empresa</label>' +
      '        <input type="text" class="form-control" name="exp_empresa[]" placeholder="Ex.: ACME Ltda." required>' +
      '      </div>' +
      '      <div class="col-12 col-md-6">' +
      '        <label class="form-label">Período</label>' +
      '        <input type="text" class="form-control" name="exp_periodo[]" placeholder="Ex.: 2020-2022" required>' +
      '      </div>' +
      '      <div class="col-12">' +
      '        <label class="form-label">Descrição</label>' +
      '        <textarea class="form-control" name="exp_descricao[]" rows="3" placeholder="Descreva atividades e resultados" required></textarea>' +
      '      </div>' +
      '    </div>' +
      '  </div>' +
      '</div>';
    container.insertAdjacentHTML('beforeend', html);
  }

  // Adiciona um bloco de referência
  function adicionarReferencia() {
    var container = document.getElementById('referencias-container');
    if (!container) return;
    var html = '' +
      '<div class="repeatable-item card border-0 shadow-sm mb-3">' +
      '  <div class="card-body">' +
      '    <div class="d-flex justify-content-between align-items-center mb-2">' +
      '      <span class="fw-semibold">Referência</span>' +
      '      <button type="button" class="btn btn-sm btn-outline-danger btn-remove" title="Remover">✕</button>' +
      '    </div>' +
      '    <div class="row g-3">' +
      '      <div class="col-12 col-md-4">' +
      '        <label class="form-label">Nome</label>' +
      '        <input type="text" class="form-control" name="ref_nome[]" placeholder="Ex.: Maria Silva" required>' +
      '      </div>' +
      '      <div class="col-12 col-md-4">' +
      '        <label class="form-label">Telefone</label>' +
      '        <input type="tel" class="form-control" name="ref_telefone[]" placeholder="(xx) xxxxx-xxxx" required>' +
      '      </div>' +
      '      <div class="col-12 col-md-4">' +
      '        <label class="form-label">Email</label>' +
      '        <input type="email" class="form-control" name="ref_email[]" placeholder="referencia@email.com" required>' +
      '      </div>' +
      '    </div>' +
      '  </div>' +
      '</div>';
    container.insertAdjacentHTML('beforeend', html);
  }

  // Remove o bloco mais próximo
  function removerCampo(btn) {
    var el = btn.closest('.repeatable-item');
    if (el) el.remove();
  }

  // Expondo funções no escopo global
  window.calcularIdade = calcularIdade;
  window.adicionarExperiencia = adicionarExperiencia;
  window.adicionarReferencia = adicionarReferencia;
  window.removerCampo = removerCampo;

  // Bind de eventos com jQuery para cliques e change
  $(function () {
    $('#data_nascimento').on('change', calcularIdade);
    calcularIdade(); // Atualiza ao carregar se houver valor

    $('#add-exp-btn').on('click', adicionarExperiencia);
    $('#add-ref-btn').on('click', adicionarReferencia);

    // Delegação para remover itens dinâmicos
    $(document).on('click', '.btn-remove', function () {
      removerCampo(this);
    });
  });
})();