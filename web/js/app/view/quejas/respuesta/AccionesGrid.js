
Ext.define('VIV.view.quejas.respuesta.AccionesGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'acciones-grid',

    width: '100%',
    border: true,
    selType: 'checkboxmodel',
    stateful: true,
    autoScroll: true,
    scrollable: 'vertical',
    height: 480,

    initComponent: function () {
        var me = this;
        this.store = Ext.create('VIV.store.AccionesStore');
        this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
            clicksToEdit: 1
        });
        this.plugins = [this.cellEditing];
        this.stateEvents = [
            'removeColumnClick'
        ];
        this.columns = [{
            text: 'Id',
            dataIndex: 'id',
            width: 35,
            hidden: true,
            align: 'center',
            sortable: false
        },{
            text: 'Cumplimiento',
            dataIndex: 'fecha',
            editor: {
                xtype: 'datefield',
                format: 'Y-m-d',
                editable: false
            },
            sortable: false,
            flex: 1
        },{
            text: 'Nombre',
            dataIndex: 'nombre',
            editor: {
                xtype: 'textfield'
            },
            sortable: false,
            flex: 2
        },{
            text: 'Descripción',
            dataIndex: 'descripcion',
            editor: {
                xtype: 'textfield'
            },
            flex: 4
        },{
            xtype: 'actioncolumn',
            align: 'center',
            width: 50,
            items: [{
                iconCls: 'delete-row',
                tooltip: 'Elimanar fila.',
                handler: function(grid, rowIndex){
                    me.fireEvent('removeColumnClick', grid.getStore().getAt(rowIndex));
                }
            }]
        },{
            text: 'queja_respuesta_id',
            dataIndex: 'qr_id',
            width: 35,
            hidden: true
        }];
        this.rbar = [{
            xtype: 'button',
            iconCls: 'fa fa-plus',
            name: 'add',
            tooltip: 'Adicionar acciones.'
        },{
            tooltip: 'Actualizar',
            iconCls: 'fa fa-refresh',
            name: 'load'
        },'-',{
            xtype: 'button',
            iconCls: 'fa fa-question',
            tooltip: 'Ayuda general'
        }];
        this.callParent();
    }
});