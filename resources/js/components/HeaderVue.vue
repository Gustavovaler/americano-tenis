<template>
    <div>
        <div class="main-wrap">
            <h3>Breakpoint Tennis</h3>
            <p>07 Nov 2021</p>
        </div>
        <div class="foot">
            <i>Individual Masculino</i>
        </div>
        <div class="content-wrap">
            <div class="actions">
                <span class="btn btn-dark text-white p-2 m-2" @click="showResultados">Resultados</span>
                <span class="btn btn-dark text-white p-2 m-2" @click="showPosiciones">Posiciones</span>
                <span class="btn btn-dark text-white p-2 m-2" @click="showJugadores">Jugadores</span>
            </div>
            <transition name="fade">
            <div class="posiciones" v-show="show_posiciones">
                <posiciones></posiciones>
            </div>
            </transition>
            <transition name="fade">
            <div class="resultados" v-show="show_resultados">
                <partido-card v-for="partido in matches_list" :key="partido.id" :data_partido="partido"></partido-card>
            </div>
            </transition>
            <transition name="fade">
                <div class="jugadores" v-show="show_jugadores">
                    <ul>
                        <li v-for="jugador of jugadores_list" :key="jugador.id">{{jugador.name}} <span class="float-right"> Zona: <span class="badge badge-pill badge-danger ml-1 p-1">  {{jugador.zona}}</span> </span></li>
                    </ul>
                </div>
            </transition>
            </div>

    </div>
</template>

<script>
import axios from "axios";
import PartidoCard from './PartidoCard.vue'
import Posiciones from './Posiciones.vue'
export default {
    components:{PartidoCard, Posiciones},
    data() {
        return {
            show_posiciones:false,
            show_resultados:true,
            show_jugadores:false,
            jugadores_list:[],
            matches_list:[]
        };
    },
    created() {
        axios.get(`${process.env.MIX_APP_URL}/matches`).then((res) => {
            console.log(res.data);
            this.matches_list = res.data;
        });
        axios.get(`${process.env.MIX_APP_URL}/players`).then((res) => {
            console.log(res.data);
            this.jugadores_list = res.data
        });
    },
    methods: {
        showResultados(){
            this.show_resultados = true
            this.show_jugadores = false
            this.show_posiciones = false
            axios.get(`${process.env.MIX_APP_URL}/matches`).then((res) => {
                console.log(res.data);
                this.matches_list = res.data;
            });
        },
        showPosiciones(){
            this.show_resultados = false
            this.show_jugadores = false
            this.show_posiciones = true
        },
        showJugadores(){
            this.show_resultados = false
            this.show_jugadores = true
            this.show_posiciones = false
        }
    },
};
</script>

<style scoped>
* {
    margin: 0;
    padding: 0;
}
.main-wrap {
    background: #0288d1;
    padding: 15px 15px 10px 15px;
    color: aliceblue;
}
.foot {
    background: #0274b2;
    color: aliceblue;
    font-size: 1.2em;
    padding: 10px 10px 10px 15px;
}
.actions{
    width: 100%;
    color: #fff;
    align-items: center;
}
.resultados, .posiciones, .jugadores{
    width: 100%;
    padding: 15px;
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

@media (min-width: 720px){
    .content-wrap{
        width: 50%;
        margin: auto;
    }
    .main-wrap, .foot{
        width: 90%;
        margin:auto;
    }
}
</style>
