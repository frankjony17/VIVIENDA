
Ext.define('VIV.store.EntrevistaStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: ["id","fecha","codigo","asunto","sintesis","tramites_realizados","concluciones","nivel_solucion","expediente","cliente_id","clasificacion_id","trabajador_id","conformidad_id"],
    autoLoad: true,
    sorters: 'fecha',
    proxy : {
        type : 'ajax',
        url: '../quejas/entrevista/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
