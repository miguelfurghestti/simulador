<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simulador - Próspera</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else

    @endif
</head>

<body class="bg-gradient-to-t from-emerald-900 to-emerald-700 flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <div class="flex flex-col gap-2 text-center bg-white w-full md:w-1/2 lg:w-[500px] rounded-4xl p-4">
        <h1 class="text-3xl font-semibold text-slate-600">Simulador</h1>

        <select id="tipo" class="bg-gray-200 p-4 rounded-2xl text-gray-500">
            <option value="">Selecione o tipo</option>
            <option value="cars">Carro</option>
            <option value="motorcycles">Moto</option>
            <option value="trucks">Caminhão</option>
        </select>

        <select id="marca" disabled class="bg-gray-200 p-4 rounded-2xl text-gray-500">
            <option value="">Nenhum tipo selecionado</option>
        </select>

        <select id="modelo" disabled class="bg-gray-200 p-4 rounded-2xl text-gray-500">
            <option value="">Nenhuma marca selecionada</option>
        </select>

        <select id="ano" disabled class="bg-gray-200 p-4 rounded-2xl text-gray-500">
            <option value="">Nenhum modelo selecionado</option>
        </select>

        <div id="valor"></div>

        <div>
            <h1 class="text-2xl text-slate-600">Selecione a Tabela</h1>
            <select id="cota" disabled class="bg-gray-200 p-4 rounded-2xl text-gray-500 w-full mt-2">
                <option value="">Escolha o veículo primeiro</option>
            </select>
        </div>

        <div id="valor-mensalidade"></div>
        <div id="valor-cota"></div>

        <div id="opcionais-carro">
            <h1 class="text-2xl text-slate-600">Opcionais</h1>

            <ul class="grid w-full gap-3 mt-2">
                <li>
                    <input type="checkbox" id="hosting-small" name="hosting" value="hosting-small" class="hidden peer" required />
                    <label for="hosting-small" class="inline-flex items-center justify-between w-full p-3 rounded-lg cursor-pointer dark:border-gray-100 dark:border dark:peer-checked:border dark:peer-checked:text-blue-500 dark:peer-checked:border-blue-500 dark:peer-checked:bg-blue-100 dark:text-gray-300 dark:bg-gray-100">
                        <div class="flex flex-row items-center justify-between w-full">
                            <div class="text-base font-normal">R$ 150.000,00 para terceiros</div>
                            <div>R$ 15,00</div>
                        </div>
                    </label>
                </li>

                <li>
                    <input type="checkbox" id="hosting-small2" name="hosting2" value="hosting-small2" class="hidden peer" required />
                    <label for="hosting-small2" class="inline-flex items-center justify-between w-full p-3 rounded-lg cursor-pointer dark:border-gray-100 dark:border dark:peer-checked:border dark:peer-checked:text-blue-500 dark:peer-checked:border-blue-500 dark:peer-checked:bg-blue-100 dark:text-gray-300 dark:bg-gray-100">
                        <div class="flex flex-row items-center justify-between w-full">
                            <div class="text-base font-normal">100% para os Vidros</div>
                            <div>R$ 9,90</div>
                        </div>
                    </label>
                </li>

                <li>
                    <input type="checkbox" id="hosting-small3" name="hosting3" value="hosting-small3" class="hidden peer" required />
                    <label for="hosting-small3" class="inline-flex items-center justify-between w-full p-3 rounded-lg cursor-pointer dark:border-gray-100 dark:border dark:peer-checked:border dark:peer-checked:text-blue-500 dark:peer-checked:border-blue-500 dark:peer-checked:bg-blue-100 dark:text-gray-300 dark:bg-gray-100">
                        <div class="flex flex-row items-center justify-between w-full">
                            <div class="text-base font-normal text-left">Rastreador</div>
                            <div>R$ 70,00</div>
                        </div>
                    </label>
                </li>
            </ul>

        </div>

        <div id="opcionais-caminhao">
        </div>

        <a href="" class="bg-green-500 p-2 rounded text-white">Enviar no WhatsApp</a>
        <!-- <a href="">Gerar PDF</a> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('tipo').addEventListener('change', function() {
            // resetar campos dependentes
            document.getElementById('marca').innerHTML = '<option value="">Selecione a Marca</option>';
            document.getElementById('valor').innerText = '';

            document.getElementById('marca').disabled = true;
            document.getElementById('modelo').disabled = true;
            document.getElementById('ano').disabled = true;

            const tipo = this.value;
            if (!tipo) return;

            axios.get(`/api/fipe/brands/${tipo}`).then(res => {
                const marcas = res.data;
                const marcasBloqueadas = ['Acura', 'Agrale', 'Alfa Romeo', 'AM Gen', 'Asia Motors', 'ASTON MARTIN', 'Baby', 'BRM', 'Bugre', 'CAB Motors', 'Cadillac', 'CBT Jipe', 'CHANGAN', 'Chrysler', 'Cross Lander', 'D2D Motors', 'Daewoo', 'Daihatsu', 'DFSK', 'Engesa', 'Envemo', 'Ferrari', 'FEVER', 'Fibravan', 'Fyber', 'GEELY', 'GREAT WALL', 'Isuzu', 'Jaecoo', 'JINBEI', 'Lada', 'Lexus', 'LOBINI', 'Lotus', 'Mahindra', 'Maserati', 'Matra', 'Mazda', 'Mclaren', 'Mercury', 'MG', 'Miura', 'NETA', 'Omoda', 'Plymouth', 'Pontiac', 'RELY', 'Rolls-Royce', 'Saab', 'Saturn', 'Seat', 'SERES', 'SHINERAY', 'smart', 'TAC', 'Wake', 'Walk', 'ZEEKR'];
                let marcaSelect = document.getElementById('marca');

                marcas.forEach(m => {
                    if (!marcasBloqueadas.includes(m.name)) {
                        marcaSelect.innerHTML += `<option value="${m.code}">${m.name}</option>`;
                    }
                });
                marcaSelect.disabled = false;
            });
        });

        document.getElementById('marca').addEventListener('change', function() {
            const tipo = document.getElementById('tipo').value;
            const marca = this.value;
            document.getElementById('modelo').innerHTML = '<option value="">Selecione o modelo</option>';

            axios.get(`/api/fipe/models/${tipo}/${marca}`).then(res => {
                const modelos = res.data; // API retorna array diretamente

                let modeloSelect = document.getElementById('modelo');
                modeloSelect.innerHTML = '<option value="">Selecione o modelo</option>';

                modelos.forEach(m => {
                    modeloSelect.innerHTML += `<option value="${m.code}">${m.name}</option>`;
                });

                modeloSelect.disabled = false;
            });
        });

        document.getElementById('modelo').addEventListener('change', function() {
            const tipo = document.getElementById('tipo').value;
            const marca = document.getElementById('marca').value;
            const modelo = this.value;
            document.getElementById('ano').innerHTML = '<option value="">Selecione o ano</option>';

            axios.get(`/api/fipe/years/${tipo}/${marca}/${modelo}`).then(res => {
                const anos = res.data;
                let anoSelect = document.getElementById('ano');
                anoSelect.innerHTML = '<option value="">Selecione o ano</option>';
                anos.forEach(a => {
                    anoSelect.innerHTML += `<option value="${a.code}">${a.name}</option>`;
                });
                anoSelect.disabled = false;
            });
        });

        document.getElementById('ano').addEventListener('change', function() {
            const tipo = document.getElementById('tipo').value;
            const marca = document.getElementById('marca').value;
            const modelo = document.getElementById('modelo').value;
            const ano = this.value;

            axios.get(`/api/fipe/value/${tipo}/${marca}/${modelo}/${ano}`).then(res => {
                const valorFipe = res.data.price;
                document.getElementById('valor').innerText = 'Valor FIPE: ' + valorFipe;

                // Popular o select de cota conforme o tipo
                const cotaSelect = document.getElementById('cota');
                cotaSelect.innerHTML = '<option value="">Selecione a tabela</option>';

                if (tipo === 'cars') {
                    cotaSelect.innerHTML += `
                <option value="0.21">Cota 0,21</option>
                <option value="0.25">Cota 0,25</option>
                <option value="0.30">Cota 0,30</option>
            `;
                } else if (tipo === 'trucks') {
                    cotaSelect.innerHTML += `
                <option value="0.18">Cota 0,18</option>
                <option value="0.20">Cota 0,20</option>
                <option value="0.22">Cota 0,22</option>
                <option value="0.25">Cota 0,25</option>
            `;
                } else if (tipo === 'motorcycles') {
                    cotaSelect.innerHTML += `
                <option value="0.50">Cota 0,50</option>
            `;
                }

                cotaSelect.disabled = false;

                // Evento para calcular e exibir valor da mensalidade
                cotaSelect.onchange = function() {
                    const cota = parseFloat(this.value); // Exemplo: 0.21 significa 0,21%
                    if (!isNaN(cota)) {

                        // Limpar o valor da FIPE
                        const valorFipeNumerico = parseFloat(
                            valorFipe.replace(/[R$\s.]/g, '').replace(',', '.')
                        );

                        // Cálculo: valor da mensalidade corresponde à porcentagem do valor FIPE
                        const valorMensalidade = ((valorFipeNumerico * (cota / 100)) + 2).toFixed(2);
                        const valorCota = (valorFipeNumerico * 4) / 100;

                        document.getElementById('valor-mensalidade').innerText =
                            'Valor da Mensalidade: R$ ' + valorMensalidade.toLocaleString('pt-BR', {
                                style: 'currency',
                                currency: 'BRL'
                            });

                        document.getElementById('valor-cota').innerText = 'Cota de Participação: ' + valorCota.toLocaleString('pt-BR', {
                            style: 'currency',
                            currency: 'BRL'
                        });


                    } else {
                        document.getElementById('valor-mensalidade').innerText = '';
                    }
                };
            });
        });
    </script>

</body>

</html>
