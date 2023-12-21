<form method="post" action="{{ url('wallet-update')}}" class="py-4">
    @csrf

    <div class="row px-4">
        
        <div class="col-md-12 col-sm-12">
            <label for="email" class="form-text">Email</label>
            <input type="email" id="email" name="email" class="form-control mb-3" placeholder="email" required>
        </div>

        <div class="col-md-12 col-sm-12">
            <label for="title" class="form-text">Amount</label>
            <input type="number" id="amount" name="amount" class="form-control mb-3" placeholder="Amount" required>
        </div>

        
        <div class="col-md-6 col-sm-12">
            <label for="title" class="form-text">Title</label>
            <select id="title" name="title" class="form-select mb-3">
                <option value="Airdrop">Bonus for airdrop</option>
            </select>
        </div>


        
        <div class="col-md-6 col-sm-12">
            <label for="type" class="form-text">Type</label>
            <select id="type" name="type" class="form-select mb-3">
                <option>deposit</option>
            </select>
        </div>


        <button class="btn btn-primary mt-4">Submit</button>
    </div>
</form>