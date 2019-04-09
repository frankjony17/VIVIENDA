
Ext.define('VIV.store.QuejasTipoStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: ["id","nombre","descripcion"],
    autoLoad: true,
    sorters: 'nombre',
    proxy : {
        type : 'ajax',
        url: '../nomenclador/quejas_tipo/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
