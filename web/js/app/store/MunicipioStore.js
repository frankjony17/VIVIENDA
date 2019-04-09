
Ext.define('VIV.store.MunicipioStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: ["id","nombre","descripcion","provincia_id"],
    autoLoad: true,
    sorters: 'nombre',
    proxy : {
        type : 'ajax',
        url: '../nomenclador/municipio/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
