<?php include_once('layout/header.php'); ?>
<div class="content-wrapper">   
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sale</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Sale</a></li>
                        <li class="breadcrumb-item active">Store management</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="content-header">
                <h4>Store management</h4>
            </div>
            <div class="row">
                <?php for($i = 0; $i < 12; $i++) : ?>
                    <div class="col-lg-3 col-12">
                        <button style="border: none;" onclick="saleItem(<?php echo $i; ?>)" class="btn">
                            <div class="card">
                                <div class="card-header">
                                    item sale
                                </div>
                                <div class="card-body">
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti nam 
                                        dignissimos voluptatum quos facere molestias laborum vitae eaque in, 
                                        cupiditate corporis quod explicabo sint eveniet nulla? Omnis dolore quam 
                                        corporis nesciunt labore minima aut. Ipsa obcaecati non numquam consequuntur 
                                        debitis ad quia recusandae, quisquam sint aut dignissimos, ipsam perspiciatis tempora!
                                    </p>
                                </div>
                                <div class="card-footer">
                                    click + 
                                </div>
                            </div>
                        </button>
                    </div>
                <?php endfor ?>
            </div>
        </div>
        <button onclick="oderItem()">check oder</button>
        <button onclick="clearLocal()">clear oder</button>
    </section>
</div> 
<?php include_once('layout/footer.php'); ?>

<script>
    const oder = []
    const saleItem = (id) => {    
        oder.push(id)
        console.log(oder)
        localStorage.setItem('oder', JSON.stringify(oder))
    }


    const oderItem = () => {
        const item = localStorage.getItem('oder')
        const data = JSON.parse(item)
        
        const counts = {}
        data.forEach((value) => {
            counts[value] = (counts[value] || 0) + 1;
        });
        console.log(counts);
    }

    const clearLocal = () => {
        localStorage.removeItem('oder')
    }
</script>