@extends('layouts.app')

@section('content')
<h3>Editar Reserva</h3>
<div class="col-md-12">
    <form method="POST" action="/reserves/{{ $reserve->id }}/update">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="vehicle">Veiculo</label>
            <select name="vehicle" id="vehicle" class="form-control">
                @foreach($vehicles as $vehicle)
                <option value="{{$vehicle['id']}}" @if($reserve->vehicle_id == $vehicle['id'])  selected @endif>
                    {{ $vehicle['model'] }} - {{ $vehicle['plate'] }}
                </option>
                @endforeach
            </select>
        </div>
        @error('vehicle')
        <div class="invalid-feedback d-block">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="costumer">Cliente</label>
            <select name="costumer" id="costumer" class="form-control">
                <option value="">Selecione um Cliente</option>
                @foreach ($costumers as $costumer)
                    <option value="{{ $costumer['id'] }}" @if($reserve->costumer_id == $costumer['id'])  selected @endif>
                        {{ $costumer['first_name'] }}  {{ $costumer['last_name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('costumer')
        <div class="invalid-feedback d-block">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="start_date">Data de Inicio</label>
            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $reserve->start_date }}">
        </div>
        @error('start_date')
        <div class="invalid-feedback d-block">
            {{$message}}
        </div>
        @enderror
        <div class="form-group">
            <label for="end_date">Data de Conclusão</label>
            <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $reserve->end_date }}">
        </div>
        @error('end_date')
        <div class="invalid-feedback d-block">
            {{$message}}
        </div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
