
Ext.define('VIV.store.EmpresaStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: ["id","nombre","codigo","telefonos","calle","entre","numero"],
    autoLoad: true,
    sorters: 'nombre',
    proxy : {
        type : 'ajax',
        url: '../nomenclador/empresa/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
