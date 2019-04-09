
Ext.define('VIV.view.despacho.DespachoForm', {
    extend: 'Ext.window.Window',
    xtype: 'form-despacho',

    title: 'Crear Queja',
    iconCls: 'despacho',
    layout: 'fit',
    modal: true,
    resizable: false,
    width: 940,

    initComponent: function () {
        var me = this;
        this.items = [{
            xtype: 'form',
            url: '../despacho/add-edit',
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
                        fieldLabel: 'Fecha (Reporte)',
                        name: 'fecha_creacion',
                        value: new Date(),
                        format: 'Y-m-d',
                        disabled: true,
                        flex: 1,
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                        margin: '0 5 0 0'
                    }, {
                        xtype: 'datefield',
                        fieldLabel: 'Fecha (Realización)',
                        name: 'fecha_culminacion',
                        value: new Date(),
                        format: 'Y-m-d',
                        editable: false,
                        flex: 1,
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                    }]
                }]
            },{
                xtype: 'fieldset',
                layout: 'anchor',
                items: [{
                    xtype: 'container',
                    border: false,
                    layout: 'hbox',
                    items: [{
                        xtype: 'combobox',
                        fieldLabel: 'Carnet de Identidad (CI)',
                        emptyText: 'Seleccione un Carnet de Identidad...',
                        name: 'cliente_id',
                        store: Ext.create('VIV.store.ClienteStore'),
                        queryMode: 'local',
                        displayField: 'ci',
                        valueField: 'id',
                        typeAhead: true,
                        selectOnFocus: true,
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                        id: 'combobox-cliente-entrevista',
                        listeners: {
                            select: function (combo, record) {
                                me.down('[name=cliente-textfield]').setValue(record.get('nombre') +" "+ record.get('apellidos'));
                                me.down('[name=empresa-textfield]').setValue(record.get('empresa'));
                            }
                        },
                        flex: 1,
                        margin: '0 5 0 0'
                    }, {
                        xtype: 'textfield',
                        fieldLabel: 'Nombre (Cliente)',
                        name: 'cliente-textfield',
                        flex: 1,
                        editable: false,
                        allowBlank: true,
                        margin: '0 5 0 0'
                    }, {
                        xtype: 'textfield',
                        fieldLabel: 'Empresa que representa (Cliente)',
                        name: 'empresa-textfield',
                        flex: 1,
                        editable: false,
                        allowBlank: true,
                    }]
                }]
            },{
                xtype: 'textareafield',
                fieldLabel: 'Asunto',
                name: 'asunto',
                grow: true,
                flex: 1,
                margin: '0 5 0 0',
                afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
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