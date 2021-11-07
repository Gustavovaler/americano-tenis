<template>
    <div>
        <div class="main-wrap">
            <h3>Breakpoint Tennis <i>(Admin)</i></h3>
            <p>07 Nov 2021</p>
        </div>
        <div class="foot">
            <i>Individual Masculino</i>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<a href="/">Publico</a>
        </div>
        <div class="actions">
            <span class="btn btn-dark text-white p-2 m-2" @click="showResultados">Resultados</span>
            <!-- <span class="btn btn-dark text-white p-2 m-2" @click="showPosiciones">Posiciones</span> -->
            <span class="btn btn-dark text-white p-2 m-2" @click="showJugadores">Jugadores</span>
        </div>
        <div class="content-wrap">
            <div class="section">
                <label for="">Nuevo Jugador</label><br>
                <input type="text" placeholder="Ingrese nombre" class="form-control" v-model="selected_name" :class="{'invalid': submitted && selected_name == ''}"><br>
                <label for="">Zona</label><br>
                <select name="" id="" class="form-control" v-model="selected_zona" :class="{'invalid': submitted && selected_zona == null}">
                    <option  disabled selected>Elija Zona</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select><br>

                <span class="btn btn-success btn-block" @click="newPlayer">Guardar</span>
                <br>
                <div class="jugadores" v-show="show_jugadores">
                    <ul>
                        <li v-for="jugador of jugadores_list" :key="jugador.id">{{jugador.name}}  <span class="float-right"> Zona: {{jugador.zona}}</span></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            jugadores_list:[],
            show_jugadores:true,
            selected_zona:null,
            selected_name:'',
            submitted:false
        }
    },
    created() {
        axios.get(`${process.env.MIX_APP_URL}/players`).then((res) => {
            console.log(res.data);
            this.jugadores_list = res.data
        });
    },
    methods: {
        showResultados(){

        },
        showJugadores(){

        },
        newPlayer(){
            this.submitted = true
            if (this.selected_zona != null && this.selected_name != null) {
                console.log()
                let data = {zona:this.selected_zona, name:this.selected_name}
                axios.post(`${process.env.MIX_APP_URL}/player`, data).then(res =>{
                    axios.get(`${process.env.MIX_APP_URL}/players`).then((res) => {

                        this.jugadores_list = res.data
                        this.selected_zona = null
                        this.selected_name = ''
                        this.submitted = false
                    });
                }).catch(console.error)
            }

        }

    },
}
</script>

<style scoped>
* {
    margin: 0;
    padding: 0;
}
.main-wrap {
    background: #adce5e;
    padding: 15px 15px 10px 15px;
    color: rgb(21, 22, 22);
}
.foot {
    background: #7cc054;
    color: rgb(27, 29, 31);
    font-size: 1.2em;
    padding: 10px 10px 10px 15px;
}

.content-wrap{
    padding: 15px;
}
.resultados, .posiciones, .jugadores{
    width: 100%;
    padding: 15px;
}
.section{
    border: 1px solid #cecece;
    border-radius: 6px;
    padding: 6px;
}
ul{
    padding-left: 20px;
}
.fade-enter-active
 {
  transition: opacity 1s
}

.fade-enter
/* .fade-leave-active in <2.1.8 */

{
  opacity: 0
}


.invalid{
    border: 1px solid red;
}
@media (min-width: 720px){
    .content-wrap, .actions{
        width: 50%;
        margin: auto;
    }
    .main-wrap, .foot{
        width: 90%;
        margin:auto;
    }
}
</style>
