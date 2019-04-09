
Ext.define('VIV.view.quejas.quejas.QuejaForm', {
    extend: 'Ext.window.Window',
    xtype: 'form-queja',

    title: 'Crear Queja',
    iconCls: 'queja',
    layout: 'fit',
    modal: true,
    resizable: false,
    width: 780,

    initComponent: function () {
        var me = this;
        this.items = [{
            xtype: 'form',
            padding: '10 10 10 10',
            autoScroll: true,
            frame: false,
            fieldDefaults: {
                anchor: '100%',
                allowBlank: false,
                labelAlign: 'top'
            },
            items:[{
                xtype: 'fieldset',
                layout: 'anchor',
                items: [{
                    xtype: 'container',
                    border: false,
                    layout: 'hbox',
                    anchor: '100%',
                    items: [{
                        xtype: 'datefield',
                        fieldLabel: 'Fecha (Culminación)',
                        name: 'fecha',
                        value: new Date(),
                        format: 'Y-m-d',
                        editable: false,
                        flex: 1,
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                        margin: '0 5 0 0'
                    }, {
                        xtype: 'combobox',
                        fieldLabel: 'Tipo (Queja)',
                        emptyText: 'Seleccione Tipo de Queja',
                        name: 'tipo',
                        store: Ext.create('VIV.store.QuejasTipoStore'),
                        queryMode: 'local',
                        displayField: 'nombre',
                        valueField: 'id',
                        editable: false,
                        flex: 2,
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                    }]
                }]
            },{
                xtype: 'hiddenfield',
                name: 'id'
            }]
        }];
        this.buttons = [{
            text: me.btnText,
            iconCls: 'fa fa-check'
        },{
            text: 'Cancelar',
            iconCls: 'fa fa-times',
            handler: function() {
                me.close();
            }
        }];
        this.callParent(arguments);
    }
});