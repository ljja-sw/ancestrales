@extends('layouts.admin')

@section('titulo','Escritorio')
@section('subtitulo','Area de Producción')

@section('contenido')
<div class="row">
    {{-- Cajas de Informacion --}}

      @component('admin.componentes.info-box')
          @slot('class','col-md-offset-3')
          @slot('color','green')
          @slot('icono','shopping-cart')
          @slot('titulo','Pedidos')
          @slot('numero',$count_pedidos)
      @endcomponent

      @component('admin.componentes.info-box')
         @slot('color','aqua')
         @slot('icono','user')
         @slot('titulo','Materiales')
         @slot('numero',$count_materiales)
     @endcomponent

    </div>
   <div class="row">
      {{-- Ordenes Recientes --}}
      <div class="col-md-8">
        <div class="box box-info">
             <div class="box-header with-border">
               <h3 class="box-title">Pedidos Recientes</h3>

               <div class="box-tools pull-right">
                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                 </button>
               </div>

             </div>
             <div class="box-body">
               <div class="">
                 <table class="table no-margin">
                    <thead>
                    <tr>
                      <th>ID de Pedido</th>
                      <th>Producto</th>
                      <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!--
                     Ejemplo de Fila de Producto
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="label label-success">Shipped</span></td>
                    </tr>
                    -->
                    </tbody>
                 </table>
               </div>
             </div>
             <div class="box-footer clearfix">
               <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Ver todos los Pedidos</a>
             </div>
           </div>
      </div>

      <div class="col-md-4">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Materiales en estado Crítico</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                  @forelse ($materiales_criticos as $material)
                     <li class="item">
                     <div class="product-info">
                       <a href="javascript:void(0)" class="product-title">{{$material->nombre}}
                       <span class="product-description">
                              {{$material->proveedor->nombre}}
                           </span>
                     </div>
                   </li>
                  @empty

                  @endforelse
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">Ver todos los Productos</a>
            </div>
            <!-- /.box-footer -->
          </div>
      </div>
   </div>
</div>
@endsection
