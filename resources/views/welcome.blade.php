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
    <div class="flex flex-col gap-2 text-center bg-white w-full md:w-1/2 lg:w-[400px] rounded-4xl p-4">
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

        <div class="w-full p-1 bg-green-200 border-green-500 border font-medium text-green-900 text-sm">
            <div id="valor">Selecione o Veículo</div>
            <div id="valor-mensalidade"></div>
            <div id="valor-cota"></div>
        </div>

        <div id="cota-tabela" class="hidden">
            <h1 class="text-2xl text-slate-600">Selecione a Tabela</h1>
            <select id="cota" disabled class="bg-gray-200 p-4 rounded-2xl text-gray-500 w-full mt-2">
                <option value="">Escolha o veículo primeiro</option>
            </select>
        </div>


        <div id="opcionais-carro" class="hidden">
            <h1 class="text-2xl text-slate-600">Opcionais Carro</h1>

            <ul class="grid w-full gap-3 mt-2">
                <li>
                    <input type="checkbox" id="opc-terceiros-carros" name="opc-terceiros-carros" value="15,00" class="hidden peer" required />
                    <label for="opc-terceiros-carros" class="inline-flex items-center justify-between w-full p-3 rounded-lg cursor-pointer dark:border-gray-100 dark:border dark:peer-checked:border dark:peer-checked:text-blue-500 dark:peer-checked:border-blue-500 dark:peer-checked:bg-blue-100 dark:text-gray-300 dark:bg-gray-100">
                        <div class="flex flex-row items-center justify-between w-full">
                            <div class="text-base font-normal">R$ 150.000,00 para terceiros</div>
                            <div>R$ 15,00</div>
                        </div>
                    </label>
                </li>

                <li>
                    <input type="checkbox" id="opc-vidros-carros" name="opc-vidros-carros" value="9,90" class="hidden peer" required />
                    <label for="opc-vidros-carros" class="inline-flex items-center justify-between w-full p-3 rounded-lg cursor-pointer dark:border-gray-100 dark:border dark:peer-checked:border dark:peer-checked:text-blue-500 dark:peer-checked:border-blue-500 dark:peer-checked:bg-blue-100 dark:text-gray-300 dark:bg-gray-100">
                        <div class="flex flex-row items-center justify-between w-full">
                            <div class="text-base font-normal">100% para os Vidros</div>
                            <div>R$ 9,90</div>
                        </div>
                    </label>
                </li>

                <li>
                    <input type="checkbox" id="opc-rastreador-carro" name="opc-rastreador-carro" value="70,00" class="hidden peer" required />
                    <label for="opc-rastreador-carro" class="inline-flex items-center justify-between w-full p-3 rounded-lg cursor-pointer dark:border-gray-100 dark:border dark:peer-checked:border dark:peer-checked:text-blue-500 dark:peer-checked:border-blue-500 dark:peer-checked:bg-blue-100 dark:text-gray-300 dark:bg-gray-100">
                        <div class="flex flex-row items-center justify-between w-full">
                            <div class="text-base font-normal text-left">Rastreador</div>
                            <div>R$ 70,00</div>
                        </div>
                    </label>
                </li>
            </ul>

        </div>

        <div id="opcionais-caminhao" class="hidden">
            <h1 class="text-2xl text-slate-600">Opcionais Caminhão</h1>

            <select id="terceiros" class="bg-gray-200 p-4 rounded-2xl text-gray-500 w-full mt-2">
                <option value="0">Selecione o plano para Terceiros</option>
                <option value="182,00">R$ 50.000,00 DM/DC - R$ 182,00</option>
                <option value="210,00">R$ 100.000,00 DM/DC - R$ 210,00</option>
                <option value="265,00">R$ 200.000,00 DM/DC - R$ 265,00</option>
                <option value="305,00">R$ 300.000,00 DM/DC - R$ 305,00</option>
                <option value="355,00">R$ 500.000,00 DM/DC - R$ 355,00</option>
                <option value="480,00">R$ 1.000.000,00 DM/DC - R$ 480,00</option>
            </select>

            <select id="guincho" class="bg-gray-200 p-4 rounded-2xl text-gray-500 w-full mt-2">
                <option value="0">Selecione o plano de Guincho</option>
                <option value="65,49">Guincho - 200KM Total - R$ 65,49</option>
                <option value="91,46">Guincho - 400KM Total - R$ 91,46</option>
                <option value="130,37">Guincho - 800KM Total - R$ 130,37</option>
                <option value="196,71">Guincho - 1200KM Total - R$ 196,71</option>
            </select>

            <ul class="grid w-full gap-3 mt-2">
                {{-- Opcionais --}}

                <li>
                    <input type="checkbox" id="opc-app" name="opc-app" value="1,39" class="hidden peer" required />
                    <label for="opc-app" class="inline-flex items-center justify-between w-full p-3 rounded-lg cursor-pointer dark:border-gray-100 dark:border dark:peer-checked:border dark:peer-checked:text-blue-500 dark:peer-checked:border-blue-500 dark:peer-checked:bg-blue-100 dark:text-gray-300 dark:bg-gray-100">
                        <div class="flex flex-row items-center justify-between w-full">
                            <div class="text-base font-normal">APP - R$ 10.000,00</div>
                            <div>R$ 1,39</div>
                        </div>
                    </label>
                </li>

                <li>
                    <input type="checkbox" id="opc-danos-morais" name="opc-danos-morais" value="8,00" class="hidden peer" required />
                    <label for="opc-danos-morais" class="inline-flex items-center justify-between w-full p-3 rounded-lg cursor-pointer dark:border-gray-100 dark:border dark:peer-checked:border dark:peer-checked:text-blue-500 dark:peer-checked:border-blue-500 dark:peer-checked:bg-blue-100 dark:text-gray-300 dark:bg-gray-100">
                        <div class="flex flex-row items-center justify-between w-full">
                            <div class="text-base font-normal">Danos Morais - R$ 10.000,00</div>
                            <div>R$ 8,00</div>
                        </div>
                    </label>
                </li>

                <li>
                    <input type="checkbox" id="opc-vidros-caminhao" name="opc-vidros-caminhao" value="15,90" class="hidden peer" required />
                    <label for="opc-vidros-caminhao" class="inline-flex items-center justify-between w-full p-3 rounded-lg cursor-pointer dark:border-gray-100 dark:border dark:peer-checked:border dark:peer-checked:text-blue-500 dark:peer-checked:border-blue-500 dark:peer-checked:bg-blue-100 dark:text-gray-300 dark:bg-gray-100">
                        <div class="flex flex-row items-center justify-between w-full">
                            <div class="text-base font-normal">100% Proteção para os Vidros</div>
                            <div>R$ 15,90</div>
                        </div>
                    </label>
                </li>

                <li>
                    <input type="checkbox" id="opc-rastreador-caminhao" name="opc-rastreador-caminhao" value="70,00" class="hidden peer" required />
                    <label for="opc-rastreador-caminhao" class="inline-flex items-center justify-between w-full p-3 rounded-lg cursor-pointer dark:border-gray-100 dark:border dark:peer-checked:border dark:peer-checked:text-blue-500 dark:peer-checked:border-blue-500 dark:peer-checked:bg-blue-100 dark:text-gray-300 dark:bg-gray-100">
                        <div class="flex flex-row items-center justify-between w-full">
                            <div class="text-base font-normal">Rastreador</div>
                            <div>R$ 70,00</div>
                        </div>
                    </label>
                </li>
            </ul>
        </div>

        <a href="" class="bg-green-500 p-2 rounded text-white">Enviar no WhatsApp</a>
        <!-- <a href="">Gerar PDF</a> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('tipo').addEventListener('change', function() {

            const marcaSelect = document.getElementById('marca');
            const modeloSelect = document.getElementById('modelo');
            const anoSelect = document.getElementById('ano');
            const cotaSelect = document.getElementById('cota');

            // Reset dos campos
            marcaSelect.innerHTML = '<option value="">Selecione a Marca</option>';
            modeloSelect.innerHTML = '<option value="">Selecione o modelo</option>';
            anoSelect.innerHTML = '<option value="">Selecione o ano</option>';
            cotaSelect.innerHTML = '<option value="">Escolha o veículo primeiro</option>';

            // Bloqueia selects dependentes
            marcaSelect.disabled = true;
            modeloSelect.disabled = true;
            anoSelect.disabled = true;
            cotaSelect.disabled = true;

            // Limpar textos
            // document.getElementById('valor').innerText = '';
            document.getElementById('valor-mensalidade').innerText = '';
            document.getElementById('valor-cota').innerText = '';

            // Limpa resultados de simulação anterior:
            document.getElementById('cota-tabela').classList.add('hidden');
            document.getElementById('valor').innerText = 'Selecione o Veículo';
            document.getElementById('valor-mensalidade').innerText = '';
            document.getElementById('valor-cota').innerText = '';

            // Esconde opcionais
            document.getElementById('opcionais-carro').classList.add('hidden');
            document.getElementById('opcionais-caminhao').classList.add('hidden');

            // Desmarca todos os checkbox opcionais
            document.querySelectorAll('#opcionais-carro input[type="checkbox"], #opcionais-caminhao input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false;
            });

            const tipo = this.value;
            if (!tipo) return;

            // Carrega marcas se o tipo for válido
            axios.get(`/api/fipe/brands/${tipo}`).then(res => {
                const marcas = res.data;
                const marcasBloqueadas = [
                    'Acura', 'Agrale', 'Alfa Romeo', 'AM Gen', 'Asia Motors', 'ASTON MARTIN', 'Baby', 'BRM', 'Bugre',
                    'CAB Motors', 'Cadillac', 'CBT Jipe', 'CHANGAN', 'Chrysler', 'Cross Lander', 'D2D Motors', 'Daewoo',
                    'Daihatsu', 'DFSK', 'Engesa', 'Envemo', 'Ferrari', 'FEVER', 'Fibravan', 'Fyber', 'GEELY', 'GREAT WALL',
                    'Isuzu', 'Jaecoo', 'JINBEI', 'Lada', 'Lexus', 'LOBINI', 'Lotus', 'Mahindra', 'Maserati', 'Matra',
                    'Mazda', 'Mclaren', 'Mercury', 'MG', 'Miura', 'NETA', 'Omoda', 'Plymouth', 'Pontiac', 'RELY',
                    'Rolls-Royce', 'Saab', 'Saturn', 'Seat', 'SERES', 'SHINERAY', 'smart', 'TAC', 'Wake', 'Walk', 'ZEEKR', 'BEPOBUS', 'CICCOBUS', 'BYD', 'CHANA', 'EFFA', 'Gurgel', 'HAFEI', 'HITECH ELECTRIC', 'JPX', 'LAMBORGHINI', 'LIFAN', 'Porsche', 'SSANGYONG', 'Subaru', 'Suzuki', 'EFFA-JMC', 'NAVISTAR', 'PUMA-ALFA', 'SHACMAN', 'ADLY', 'AGRALE', 'AMAZONAS', 'APRILIA', 'ATALA', 'AVELLOZ', 'BAJAJ', 'BEE', 'Benelli', 'BETA', 'BIMOTA', 'BRANDY', 'BRAVA', 'BRP', 'BUELL', 'BUENO', 'BULL', 'byCristo', 'CAGIVA', 'CALOI', 'DAELIM', 'DAYANG', 'DAYUN', 'DERBY', 'DAFRA', 'DUCATI', 'EMME', 'FOX', 'FUSCO MOTOSEGURA', 'FYM', 'GARINNI', 'GAS GAS', 'GREEN', 'HAOBAO', 'HAOJUE', 'HARLEY-DAVIDSON', 'HARTFORD', 'HERO', 'HUSABERG', 'HUSQVARNA', 'INDIAN', 'IROS', 'JIAPENG VOLCANO', 'JOHNNYPAG', 'JONNY', 'KAHENA', 'KASINSKI', 'KTM', 'KYMCO', 'LANDUM', 'LAVRALE', 'LERIVO', 'Lon-V', 'MAGRÃO TRICICLOS', 'Malaguti', 'MIZA', 'MOTO GUZZI', 'MOTOCAR', 'MOTORINO', 'MRX', 'MV AGUSTA', 'MVK', 'NIU', 'ORCA', 'PEGASSI', 'PEUGEOT', 'PIAGGIO', 'POLARIS', 'REGAL RAPTOR', 'RIGUETE', 'Royal Enfield', 'SANYANG', 'SIAMOTO', 'SUNDOWN', 'SUPER SOCO', 'TARGOS', 'TIGER', 'TRAXX', 'TRIUMPH', 'Ventane Motors', 'VENTO', 'VOLTZ', 'WATTS', 'WUYANG', 'ZONTES', 'DERBI', 'L\'AQUILA', 'Audi', 'BMW', 'Dodge', 'FOTON', 'JAC', 'Jaguar', 'MINI', 'Rover', 'Troller'
                ];

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

            document.getElementById('cota-tabela').classList.add('hidden');
            document.getElementById('valor').innerText = 'Selecione o Veículo';
            document.getElementById('valor-mensalidade').innerText = '';
            document.getElementById('valor-cota').innerText = '';

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

            document.getElementById('cota-tabela').classList.add('hidden');
            document.getElementById('valor').innerText = 'Selecione o Veículo';
            document.getElementById('valor-mensalidade').innerText = '';
            document.getElementById('valor-cota').innerText = '';

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
                const divCota = document.getElementById('cota-tabela');
                const cotaSelect = document.getElementById('cota');
                cotaSelect.innerHTML = '<option value="">Selecione a tabela</option>';

                divCota.classList.remove('hidden');

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
                    const cota = parseFloat(this.value);
                    const tipo = document.getElementById('tipo').value;

                    const divCarro = document.getElementById('opcionais-carro');
                    const divCaminhao = document.getElementById('opcionais-caminhao');

                    divCarro.classList.add('hidden');
                    divCaminhao.classList.add('hidden');

                    if (tipo === 'cars') {
                        divCarro.classList.remove('hidden');
                    } else if (tipo === 'trucks') {
                        divCaminhao.classList.remove('hidden');
                    }

                    if (!isNaN(cota)) {

                        const valorFipeNumerico = parseFloat(
                            valorFipe.replace(/[R$\s.]/g, '').replace(',', '.')
                        );

                        let valorBaseMensalidade = valorFipeNumerico * (cota / 100);

                        // Aplicar mínimo conforme tipo
                        if (tipo === 'cars' && valorBaseMensalidade < 63) {
                            valorBaseMensalidade = 63;
                        } else if (tipo === 'motorcycles' && valorBaseMensalidade < 40) {
                            valorBaseMensalidade = 40;
                        }

                        const valorFinalMensalidade = (valorBaseMensalidade + 2).toFixed(2);
                        const valorCota = (valorFipeNumerico * 4) / 100;

                        document.getElementById('valor-mensalidade').innerText =
                            'Valor da Mensalidade: R$ ' + valorFinalMensalidade.toLocaleString('pt-BR', {
                                style: 'currency',
                                currency: 'BRL'
                            });

                        document.getElementById('valor-cota').innerText =
                            'Cota de Participação: ' + valorCota.toLocaleString('pt-BR', {
                                style: 'currency',
                                currency: 'BRL'
                            });

                    } else {
                        document.getElementById('valor-mensalidade').innerText = '';
                        document.getElementById('valor-cota').innerText = '';
                    }
                };

            });
        });
    </script>

</body>

</html>