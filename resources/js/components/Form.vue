<template>
    <div class="form-wrapper">
        <form @submit.prevent="submitForm">
            <div>
                <label>Nome *</label>
                <input v-model="form.nome" required placeholder="Ex.: Padaria Pão Quente" />
            </div>

            <div>
                <label>Número do WhatsApp *</label>
                <input v-model="form.numero_whatsapp" required placeholder="" />
            </div>

            <div>
                <label>CEP *</label>
                <input v-model="form.cep" required placeholder="" />
            </div>

            <div>
                <label>Rua *</label>
                <input v-model="form.rua" required />
            </div>

            <div>
                <label>Número *</label>
                <input v-model="form.numero" required />
            </div>

            <div>
                <label>Bairro *</label>
                <input v-model="form.bairro" required />
            </div>

            <div>
                <label>Estado:</label>
                <select v-model="form.estado" required>
                    <option value="">Selecione um estado</option>
                    <option v-for="estado in estados" :key="estado.uf" :value="estado.uf">
                        {{ estado.nome }}
                    </option>
                </select>
            </div>

            <div>
                <label>CNPJ/CPF *</label>
                <input v-model="form.cnpj_cpf" required />
            </div>

            <div>
                <label>Segmento *</label>
                <select v-model="form.segmento_id">
                    <option v-for="segmento in segmentos" :key="segmento.id" :value="segmento.id">
                        {{ segmento.nome }}
                    </option>
                    <option value="outro">Outro</option>
                </select>
            </div>

            <div v-if="form.segmento_id === 'outro'">
                <label>Novo Segmento:</label>
                <input v-model="novoSegmento" required />
            </div>

            <p>* Campo de preenchimento obrigatório</p>

            <button type="submit">Cadastrar Empresa</button>
        </form>

        <div v-if="mensagem" :style="{ marginTop: '20px', color: sucesso ? 'green' : 'red' }">
            {{ mensagem }}
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                nome: '',
                cep: '',
                rua: '',
                numero: '',
                bairro: '',
                estado: '',
                numero_whatsapp: '',
                cnpj_cpf: '',
                segmento_id: '',
            },
            estados: [
                    { uf: 'AC', nome: 'Acre' },
                    { uf: 'AL', nome: 'Alagoas' },
                    { uf: 'AP', nome: 'Amapá' },
                    { uf: 'AM', nome: 'Amazonas' },
                    { uf: 'BA', nome: 'Bahia' },
                    { uf: 'CE', nome: 'Ceará' },
                    { uf: 'DF', nome: 'Distrito Federal' },
                    { uf: 'ES', nome: 'Espírito Santo' },
                    { uf: 'GO', nome: 'Goiás' },
                    { uf: 'MA', nome: 'Maranhão' },
                    { uf: 'MT', nome: 'Mato Grosso' },
                    { uf: 'MS', nome: 'Mato Grosso do Sul' },
                    { uf: 'MG', nome: 'Minas Gerais' },
                    { uf: 'PA', nome: 'Pará' },
                    { uf: 'PB', nome: 'Paraíba' },
                    { uf: 'PR', nome: 'Paraná' },
                    { uf: 'PE', nome: 'Pernambuco' },
                    { uf: 'PI', nome: 'Piauí' },
                    { uf: 'RJ', nome: 'Rio de Janeiro' },
                    { uf: 'RN', nome: 'Rio Grande do Norte' },
                    { uf: 'RS', nome: 'Rio Grande do Sul' },
                    { uf: 'RO', nome: 'Rondônia' },
                    { uf: 'RR', nome: 'Roraima' },
                    { uf: 'SC', nome: 'Santa Catarina' },
                    { uf: 'SP', nome: 'São Paulo' },
                    { uf: 'SE', nome: 'Sergipe' },
                    { uf: 'TO', nome: 'Tocantins' },
                ],
            segmentos: [],
            novoSegmento: '',
            mensagem: '',
            sucesso: false,
        };
    },
    created() {
        this.fetchSegmentos();
    },
    methods: {
        fetchSegmentos() {
            fetch('http://127.0.0.1:8000/api/segmentos')
                .then((res) => res.json())
                .then((data) => {
                    this.segmentos = data;
                });
        },
        submitForm() {
            const payload = { ...this.form };

            if (payload.segmento_id === 'outro') {
                payload.segmento_outro = this.novoSegmento;
            }

            fetch('http://127.0.0.1:8000/api/empresas', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify(payload),
            })
                .then((res) => res.json())
                .then((data) => {
                    console.log(data);
                    if (data.success) {
                        this.mensagem = 'Empresa cadastrada com sucesso!';
                        this.sucesso = true;
                        this.resetForm();
                        this.fetchSegmentos();
                    } else {
                        this.mensagem = 'Erro ao cadastrar empresa.';
                        this.sucesso = false;
                    }
                })
                .catch(() => {
                    this.mensagem = 'Erro na conexão com o servidor.';
                    this.sucesso = false;
                });
        },
        resetForm() {
            this.form = {
                nome: '',
                cep: '',
                rua: '',
                numero: '',
                bairro: '',
                estado: '',
                numero_whatsapp: '',
                cnpj_cpf: '',
                segmento_id: '',
            };
            this.novoSegmento = '';
        },
    },
};
</script>

<style scoped>
.form-wrapper {
    max-width: 70rem;
    margin: auto;
    padding: 2rem;
    font-family: sans-serif;
}
form div {
    margin-bottom: 10px;
}
input,
select {
    width: 100%;
    padding: 5px;
}
button {
    padding: 1.3rem 1.2rem;
    background: transparent;
    color: white;
    border-radius: 1rem;
    border: 0.2rem solid var(--primary-color);
    cursor: pointer;
    color: var(--primary-color);
    font-weight: bold;
    transition: ease-in-out 0.3s;
    margin-top: 2rem;
}
button:hover {
    background: var(--primary-color);
    color: var(--quaternary-color);
    border: 0.2rem solid var(--quaternary-color);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transform: scale(1.05);
}

label {
    font-size: 1.6rem;
}

p {
    font-size: 1.2rem;
    color: #666;
}
</style>
