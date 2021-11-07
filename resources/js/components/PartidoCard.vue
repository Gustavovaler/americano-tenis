<template>
    <div class="table-wrap">
        <span class="zona">Zona: <span class="badge badge-pill badge-danger"> {{data_partido.zona}}</span></span>
        <table>
            <tr>
                <td class="player-name"> {{data_partido.player_1}}</td>
                <td class="float-right">{{data_partido.resultado_player_1}}</td>
            </tr>
            <tr>
                <td class="player-name"><span class="badge badge-pill badge-secondary"> </span> {{data_partido.player_2}}</td>
                <td class="float-right">{{data_partido.resultado_player_2}}</td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    props: ["data_partido"],
    data() {
        return {};
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

</style>
