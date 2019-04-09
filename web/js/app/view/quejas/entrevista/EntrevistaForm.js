
Ext.define('VIV.view.quejas.entrevista.EntrevistaForm', {
    extend: 'Ext.window.Window',
    xtype: 'form-entrevista',

    iconCls: '',
    layout: 'fit',
    header: false,
    modal: true,
    maximized: true,
    resizable: false,

    initComponent: function () {
        var me = this;

        this.items = [{
            xtype: 'form',
            url: '../quejas/entrevista/add-edit',
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
            }, {
                xtype: 'fieldset',
                layout: 'anchor',
                items: [{
                    xtype: 'container',
                    border: false,
                    layout: 'hbox',
                    items: [{
                        xtype: 'datefield',
                        fieldLabel: 'Fecha',
                        name: 'fecha',
                        value: new Date(),
                        format: 'Y-m-d',
                        editable: false,
                        disabled: true,
                        flex: 2,
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                        margin: '0 5 0 0'
                    }, {
                        xtype: 'combobox',
                        fieldLabel: 'Expediente',
                        emptyText: 'Expediente',
                        name: 'expediente',
                        store: Ext.create('Ext.data.ArrayStore', {
                            fields: ['estado', 'value'],
                            data: [[true, 'Si'], [false, 'No']]
                        }),
                        queryMode: 'local',
                        displayField: 'value',
                        valueField: 'estado',
                        editable: false,
                        flex: 1,
                        margin: '0 5 0 0'
                    }, {
                        xtype: 'combobox',
                        fieldLabel: 'Código',
                        emptyText: 'Código',
                        name: 'codigo',
                        store: Ext.create('Ext.data.ArrayStore', {
                            fields: ['codigo', 'descripcion'],
                            data: [
                                ['0101', 'Inmuebles (casa, apartamentos, etc )'],
                                ['0102', 'Ampliaciones '],
                                ['0103', 'Permutas entre particulares'],
                                ['0104', 'Permutas entre particulares y el estado'],
                                ['0105', 'Albergues'],
                                ['0106', 'Inversión y rehabilitación de la vivienda'],
                                ['0107', 'Materiales de la construcción'],
                                ['0108', 'Reparaciones y construcciones'],
                                ['0109', 'Reparaciones y construcciones colectivas'],
                                ['0110', 'Créditos '],
                                ['0111', 'Incorporación a Micro brigadas'],
                                ['0112', 'Movimiento de Micro brigadas'],
                                ['0113', 'Litigios'],
                                ['0114', 'Solares'],
                                ['0115', 'Compra y venta (ilegalidades)'],
                                ['0116', 'Legalización de viviendas y solares'],
                                ['0117', 'Funcionamiento de las Direcciones de Vivienda'],
                                ['0118', 'Ley General de la Vivienda'],
                                ['0119', 'Comisiones de asignación de viviendas'],
                                ['0120', 'Afectaciones del Estado a particulares'],
                                ['0121', 'Viviendas vinculadas y medios básicos'],
                                ['0122', 'Ocupaciones ilegales'],
                                ['0123', 'Inmigración interna'],
                                ['0124', 'Confiscaciones'],
                                ['0125', 'Construcciones ilegales'],
                                ['0126', 'Arrendamientos'],
                                ['0127', 'Licencias para nuevas construcciones '],
                                ['0128', 'Funcionamiento del arquitecto de la comunidad '],
                                ['0129', 'Sobre trabajadores, dirigentes y funcionarios'],
                                ['0130', 'Otros asuntos']
                            ]
                        }),
                        queryMode: 'local',
                        displayField: 'codigo',
                        valueField: 'codigo',
                        typeAhead: true,
                        selectOnFocus: true,
                        tpl: Ext.create('Ext.XTemplate',
                            '<ul class="x-list-plain"><tpl for=".">',
                            '<li role="option" class="x-boundlist-item">({codigo}) - {descripcion}</li>',
                            '</tpl></ul>'
                        ),
                        displayTpl: Ext.create('Ext.XTemplate',
                            '<tpl for=".">',
                            '({codigo}) - {descripcion}',
                            '</tpl>'
                        ),
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                        flex: 1,
                        margin: '0 5 0 0'
                    }, {
                        xtype: 'combobox',
                        fieldLabel: 'Clasificacion',
                        emptyText: 'Clasificacion',
                        name: 'clasificacion_id',
                        store: Ext.create('VIV.store.ClasificacionStore'),
                        queryMode: 'local',
                        displayField: 'nombre',
                        valueField: 'id',
                        editable: false,
                        flex: 2,
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
                        xtype: 'textareafield',
                        fieldLabel: 'Asunto',
                        name: 'asunto',
                        grow: true,
                        flex: 1,
                        margin: '0 5 0 0',
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                    }, {
                        xtype: 'textareafield',
                        fieldLabel: 'Síntesis',
                        name: 'sintesis',
                        grow: true,
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
                        xtype: 'textareafield',
                        fieldLabel: 'Trámites Realizados',
                        name: 'tramites_realizados',
                        grow: true,
                        flex: 1,
                        margin: '0 5 0 0',
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                    }, {
                        xtype: 'textareafield',
                        fieldLabel: 'Concluciones',
                        name: 'concluciones',
                        grow: true,
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
                        xtype: 'textareafield',
                        fieldLabel: 'Nivel Solución',
                        name: 'nivel_solucion',
                        grow: true,
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
                        fieldLabel: 'Conformidad',
                        emptyText: 'Conformidad',
                        name: 'conformidad_id',
                        store: Ext.create('VIV.store.ConformidadStore'),
                        queryMode: 'local',
                        displayField: 'nombre',
                        valueField: 'id',
                        editable: false,
                        flex: 1,
                        margin: '0 5 0 0',
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                    }, {
                        xtype: 'combobox',
                        fieldLabel: 'Trabajador',
                        emptyText: 'Trabajador',
                        name: 'trabajador_id',
                        store: Ext.create('VIV.store.TrabajadorStore'),
                        queryMode: 'local',
                        displayField: 'nombre_apellidos',
                        valueField: 'id',
                        editable: false,
                        flex: 1,
                        afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                    }]
                }]
            },{
                xtype: 'hiddenfield',
                name: 'id'
            }]
        }];
        this.rbar = ['',{
            action: me.actionBtn,
            iconCls: 'fa fa-save',
            tooltip: 'Salvar Entrevista.'
        },{
            iconCls: 'fa fa-times',
            tooltip: 'Cancelar Entrevista.',
            handler: function() {
                me.close();
            }
        },'-',{
            xtype: 'tbtext',
            html: '<span style="font-weight: bold; font-size: large; text-align: center;">R<br>E<br>A<br>L<br>I<br>Z<br>A<br>R<br><br>E<br>N<br>T<br>R<br>E<br>V<br>I<br>S<br>T<br>A</span>'
        }];
        this.callParent(arguments);
    }
});