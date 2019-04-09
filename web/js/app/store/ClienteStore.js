
Ext.define('VIV.store.ClienteStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: ["id","ci","nombre_apellidos","calle","entre","apartamento","edificio","casa","telefonos","correo","empresa","empresa_id","municipio","municipio_id"],
    autoLoad: true,
    sorters: 'ci',
    groupField: 'empresa',
    proxy : {
        type : 'ajax',
        url: '../quejas/cliente/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
