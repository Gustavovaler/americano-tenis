<template>
    <div class="table-wrap">
        <span class="zona">Zona: <span class="badge badge-pill badge-danger"> {{data_partido.zona}}</span></span>
            <span class="float-right" ></span>
        <table>
            <tr>
                <td class="player-name"> {{data_partido.player_1}}</td>
                <td class=""><input type="number"  min="0"  maxlength="1" name="jug1" size="1" class="form-control" v-model="res_j_1"></td>
            </tr>
            <tr>
                <td class="player-name"><span class="badge badge-pill badge-secondary"> </span> {{data_partido.player_2}}</td>
                <td class=""><input type="number"  min="0"  size="1" name="jug2" maxlength="1" class="form-control" v-model="res_j_2"></td>
            </tr>
            <tr>
                <td></td>
                <td><span class="btn btn-success btn-sm" @click="editarResultado(data_partido.id)" >Guardar</span></td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    props: ["data_partido"],
    data() {
        return {
            res_j_1:0,
            res_j_2:0
        };
    },
    methods: {
        editarResultado(id){
            console.log(id)
        }
    },
};
</script>

<style scoped>
.float-right{
    float: right;
    width: 20%;
}
.player-name{
    width: 80%;
}
.table-wrap{
    width: 100%;
    padding: 10px 20px;
    border: 1px solid #cecece;
    border-radius: 8px;
    margin-bottom: 3px;
}
table{
    width: 100%;
}
.badge{
    translate: ;
}
.zona{
    font-size: .7em;
}
input{
    font-size:.8em;
}

</style>
