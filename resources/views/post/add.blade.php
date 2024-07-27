
<x-layout>
    <div @class(['row'])>
        <div @class(['col-md-12'])>
            <a type="button" class="btn btn-primary mb-2"  href="{{route('post_list')}}">Back</a>
        </div>
    </div>
    <div @class(['row'])>
        <div @class(['col-md-12'])>
            <form autocomplete="off" action="{{route('post_submit')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" name="title">
                </div>                        
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="form-group text-right">              
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
     
    </div>
</x-layout>