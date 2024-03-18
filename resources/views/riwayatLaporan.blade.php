@extends('template')
@section('head')
    <link rel="stylesheet" href="{{ asset('datatable/datatables.min.css') }}">
    <script src="{{ asset('datatable/datatables.min.js') }}"></script>
    <style>
        .btn-auto {
            font-size: 20px;
            width: auto;
            height: auto;
            color: rgb(241, 241, 241);
        }

        .bg-green {
            background-color: rgb(14, 100, 50);
        }

        .bg-orange {
            background-color: rgb(177, 112, 14);
        }

        .bg-grey {
            background-color: rgb(236, 236, 236);
        }
    </style>
    <script>
        $(function() {
            $(".tanggalrapat").datepicker();
        });
    </script>
@endsection
@section('body')
    <div class="m-0 p-3 mx-5 rounded bg-white bg-opacity-75">
        <table id="example" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">Tanggal Rapat</th>
                    <th class="text-center">Perihal Mahasiswa</th>
                    <th class="text-center">Perihal Dosen</th>
                    <th class="text-center">Perihal Tendik</th>
                    <th class="text-center">Perihal Sarana Prasarana</th>
                    <th class="text-center">Lain-lain</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">08-08-2001</td>
                    <td class="text-center text-truncate" style="max-width: 50px">Lorem ipsum dolor sit, amet consectetur
                        adipisicing elit.
                        Inventore
                        reprehenderit quam quos voluptates est, nam dicta, quibusdam distinctio deserunt itaque autem nisi.
                        At inventore perferendis repellat amet quia perspiciatis. Ex rerum molestias a amet labore
                        accusantium! Quidem rerum nesciunt eligendi dolore quibusdam dolorem excepturi placeat, quasi
                        deserunt natus aperiam at!</td>
                    <td class="text-center text-truncate" style="max-width: 50px">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Est ullam debitis,
                        placeat fuga dignissimos nemo fugiat, alias tenetur sapiente animi architecto veniam eos nesciunt
                        eius consequatur aliquid. Aliquam fugit vel itaque tenetur dignissimos excepturi unde harum,
                        perferendis quos animi. Quia rerum nobis rem, autem distinctio veritatis quisquam beatae minima
                        laudantium.</td>
                    <td class="text-center text-truncate" style="max-width: 50px">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Consequuntur sequi
                        perferendis voluptatibus tempora at! Ducimus voluptate tempore adipisci atque debitis iste culpa,
                        sequi delectus earum deserunt aliquam totam, rerum quisquam laboriosam voluptatem optio ex?
                        Asperiores possimus libero rerum soluta fugit temporibus, quasi, omnis officiis voluptas aliquid
                        facilis illo sequi maxime.</td>
                    <td class="text-center text-truncate" style="max-width: 50px">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Mollitia tempore,
                        expedita, quam assumenda aliquam doloremque minima deserunt excepturi eaque voluptate atque enim
                        odio autem nisi, sequi dolores possimus fuga nulla? Tempora, excepturi? Possimus maxime id placeat
                        rem eligendi, facere fuga eius perferendis corrupti in voluptatibus labore modi! Cupiditate, cumque
                        assumenda.</td>
                    <td class="text-center text-truncate" style="max-width: 50px">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Voluptatem, tenetur
                        soluta ex consequatur corrupti a enim rerum? Aperiam dolore necessitatibus iste provident ratione
                        quo, quisquam sequi consequuntur quidem dolores vero aut laborum culpa maiores, quas perferendis
                        quis obcaecati, sed consectetur corrupti. Enim, similique quas molestiae quis veritatis odio
                        voluptas itaque.</td>
                    <td class="text-center d-flex gap-1">
                        <!-- Button untuk melihat modal detail laporan-->
                        <div class="btn btn-auto bg-green p-2 d-flex flex-column" data-bs-toggle="modal"
                            data-bs-target="#modalDetail1">
                            <i class="fa fa-info-circle mx-auto my-auto"></i>
                            Detail
                        </div>
                        <!-- Button untuk melihat modal ubah detail laporan-->
                        <div class="btn btn-auto bg-orange p-2 d-flex flex-column" data-bs-toggle="modal"
                            data-bs-target="#modalUbah1">
                            <i class="fa-solid fa-user-pen mx-auto my-auto"></i>
                            Ubah
                        </div>
                    </td>
                </tr>
                <!-- Modal detail laporan -->
                <div class="modal fade" id="modalDetail1" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div>
                                            Perihal Tendik :
                                        </div>
                                        <div class="bg-grey p-1 rounded">
                                            Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Est ullam debitis,
                                            placeat fuga dignissimos nemo fugiat, alias tenetur sapiente animi architecto
                                            veniam
                                            eos nesciunt
                                            eius consequatur aliquid. Aliquam fugit vel itaque tenetur dignissimos excepturi
                                            unde harum,
                                            perferendis quos animi. Quia rerum nobis rem, autem distinctio veritatis
                                            quisquam
                                            beatae minima
                                            laudantium.
                                        </div>
                                        <div>
                                            Perihal Sarana Prasarana :
                                        </div>
                                        <div class="bg-grey p-1 rounded">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                            Inventore
                                            reprehenderit quam quos voluptates est, nam dicta, quibusdam distinctio deserunt
                                            itaque autem nisi.
                                            At inventore perferendis repellat amet quia perspiciatis. Ex rerum molestias a
                                            amet
                                            labore
                                            accusantium! Quidem rerum nesciunt eligendi dolore quibusdam dolorem excepturi
                                            placeat, quasi
                                            deserunt natus aperiam at!
                                        </div>
                                        <div>
                                            Perihal Lain-lain :
                                        </div>
                                        <div class="bg-grey p-1 rounded">
                                            Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Est ullam debitis,
                                            placeat fuga dignissimos nemo fugiat, alias tenetur sapiente animi architecto
                                            veniam
                                            eos nesciunt
                                            eius consequatur aliquid. Aliquam fugit vel itaque tenetur dignissimos excepturi
                                            unde harum,
                                            perferendis quos animi. Quia rerum nobis rem, autem distinctio veritatis
                                            quisquam
                                            beatae minima
                                            laudantium.
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div>
                                            Tanggal Rapat :
                                        </div>
                                        <div class="bg-grey p-1 rounded">
                                            08-08-2001
                                        </div>
                                        <div>
                                            Perihal Mahasiswa :
                                        </div>
                                        <div class="bg-grey p-1 rounded">
                                            Lorem ipsum dolor sit, amet consectetur
                                            adipisicing elit.
                                            Inventore
                                            reprehenderit quam quos voluptates est, nam dicta, quibusdam distinctio deserunt
                                            itaque autem nisi.
                                            At inventore perferendis repellat amet quia perspiciatis. Ex rerum molestias a
                                            amet
                                            labore
                                            accusantium! Quidem rerum nesciunt eligendi dolore quibusdam dolorem excepturi
                                            placeat, quasi
                                            deserunt natus aperiam at!
                                        </div>
                                        <div>
                                            Perihal Dosen :
                                        </div>
                                        <div class="bg-grey p-1 rounded">
                                            Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Est ullam debitis,
                                            placeat fuga dignissimos nemo fugiat, alias tenetur sapiente animi architecto
                                            veniam
                                            eos nesciunt
                                            eius consequatur aliquid. Aliquam fugit vel itaque tenetur dignissimos excepturi
                                            unde harum,
                                            perferendis quos animi. Quia rerum nobis rem, autem distinctio veritatis
                                            quisquam
                                            beatae minima
                                            laudantium.

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal ubah laporan -->
                <div class="modal fade" id="modalUbah1" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Laporan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div>
                                            Perihal Tendik :
                                        </div>
                                        <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30" rows="8">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, unde? Sequi doloribus reprehenderit iusto, illo dignissimos nostrum qui saepe natus minus. Provident rem error quibusdam est, quidem voluptates sapiente, deleniti accusantium labore unde aut eligendi. Laborum dolores tempora magni, aliquam asperiores quod consectetur debitis! Pariatur saepe tenetur doloremque eum omnis.
                                        </textarea>
                                        <div>
                                            Perihal Sarana Prasarana :
                                        </div>
                                        <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30" rows="8">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit impedit incidunt dicta ipsam mollitia aspernatur quis eaque ab assumenda molestiae adipisci, sunt at dignissimos. Distinctio facere iure libero omnis mollitia quaerat maxime, numquam error vel id quis facilis assumenda aspernatur voluptatum in reiciendis sapiente hic recusandae dolorem animi labore corrupti.
                                        </textarea>
                                        <div>
                                            Perihal Lain-lain :
                                        </div>
                                        <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30" rows="8">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam adipisci assumenda provident officiis et cupiditate doloremque hic, expedita eaque deserunt nesciunt sequi quam, recusandae possimus nihil unde. Eligendi natus ex voluptas dolorem deleniti, accusantium necessitatibus obcaecati eum reiciendis. Corrupti quos ratione fugit saepe. Nihil sapiente, harum qui impedit vitae consectetur!
                                        </textarea>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div>
                                            Tanggal Rapat :
                                        </div>
                                        <input type="text" value="08-08-2001"
                                            class="form-control w-100 bg-grey p-1 rounded tanggalrapat">
                                        <div>
                                            Perihal Mahasiswa :
                                        </div>
                                        <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30" rows="8">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla odio ex aliquid, quis laborum voluptates deserunt similique in quasi repudiandae! Voluptatibus, error! Officia vero nulla, asperiores temporibus natus esse nobis obcaecati numquam aliquam. Amet, magnam porro labore aperiam quidem nulla, reprehenderit a aliquid eum incidunt iste at, distinctio nobis sequi?
                                        </textarea>
                                        <div>
                                            Perihal Dosen :
                                        </div>
                                        <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30"
                                            rows="8">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem eaque fugit, veritatis ipsam natus alias, aut accusantium quibusdam sunt harum placeat deserunt ad similique perspiciatis quae quisquam velit ea! Amet, hic maxime eius ipsam sequi quos, nobis, aliquid voluptates dicta quo dolor. Inventore nostrum illum tempora, hic dolorem fugit commodi.
                                        </textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-green" data-bs-dismiss="modal">Submit</button>

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <tr>
                    <td class="text-center">08-08-2001</td>
                    <td class="text-center text-truncate" style="max-width: 50px">Lorem ipsum dolor sit, amet consectetur
                        adipisicing elit.
                        Inventore
                        reprehenderit quam quos voluptates est, nam dicta, quibusdam distinctio deserunt itaque autem nisi.
                        At inventore perferendis repellat amet quia perspiciatis. Ex rerum molestias a amet labore
                        accusantium! Quidem rerum nesciunt eligendi dolore quibusdam dolorem excepturi placeat, quasi
                        deserunt natus aperiam at!</td>
                    <td class="text-center text-truncate" style="max-width: 50px">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Est ullam debitis,
                        placeat fuga dignissimos nemo fugiat, alias tenetur sapiente animi architecto veniam eos nesciunt
                        eius consequatur aliquid. Aliquam fugit vel itaque tenetur dignissimos excepturi unde harum,
                        perferendis quos animi. Quia rerum nobis rem, autem distinctio veritatis quisquam beatae minima
                        laudantium.</td>
                    <td class="text-center text-truncate" style="max-width: 50px">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Consequuntur sequi
                        perferendis voluptatibus tempora at! Ducimus voluptate tempore adipisci atque debitis iste culpa,
                        sequi delectus earum deserunt aliquam totam, rerum quisquam laboriosam voluptatem optio ex?
                        Asperiores possimus libero rerum soluta fugit temporibus, quasi, omnis officiis voluptas aliquid
                        facilis illo sequi maxime.</td>
                    <td class="text-center text-truncate" style="max-width: 50px">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Mollitia tempore,
                        expedita, quam assumenda aliquam doloremque minima deserunt excepturi eaque voluptate atque enim
                        odio autem nisi, sequi dolores possimus fuga nulla? Tempora, excepturi? Possimus maxime id placeat
                        rem eligendi, facere fuga eius perferendis corrupti in voluptatibus labore modi! Cupiditate, cumque
                        assumenda.</td>
                    <td class="text-center text-truncate" style="max-width: 50px">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Voluptatem, tenetur
                        soluta ex consequatur corrupti a enim rerum? Aperiam dolore necessitatibus iste provident ratione
                        quo, quisquam sequi consequuntur quidem dolores vero aut laborum culpa maiores, quas perferendis
                        quis obcaecati, sed consectetur corrupti. Enim, similique quas molestiae quis veritatis odio
                        voluptas itaque.</td>
                    <td class="text-center d-flex gap-1">
                        <!-- Button untuk melihat modal detail laporan-->
                        <div class="btn btn-auto bg-green p-2 d-flex flex-column" data-bs-toggle="modal"
                            data-bs-target="#modalDetail2">
                            <i class="fa fa-info-circle mx-auto my-auto"></i>
                            Detail
                        </div>
                        <!-- Button untuk melihat modal ubah detail laporan-->
                        <div class="btn btn-auto bg-orange p-2 d-flex flex-column" data-bs-toggle="modal"
                            data-bs-target="#modalUbah2">
                            <i class="fa-solid fa-user-pen mx-auto my-auto"></i>
                            Ubah
                        </div>
                    </td>
                </tr>
                <!-- Modal detail laporan -->
                <div class="modal fade" id="modalDetail2" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div>
                                            Perihal Tendik :
                                        </div>
                                        <div class="bg-grey p-1 rounded">
                                            Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Est ullam debitis,
                                            placeat fuga dignissimos nemo fugiat, alias tenetur sapiente animi architecto
                                            veniam
                                            eos nesciunt
                                            eius consequatur aliquid. Aliquam fugit vel itaque tenetur dignissimos excepturi
                                            unde harum,
                                            perferendis quos animi. Quia rerum nobis rem, autem distinctio veritatis
                                            quisquam
                                            beatae minima
                                            laudantium.
                                        </div>
                                        <div>
                                            Perihal Sarana Prasarana :
                                        </div>
                                        <div class="bg-grey p-1 rounded">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                            Inventore
                                            reprehenderit quam quos voluptates est, nam dicta, quibusdam distinctio deserunt
                                            itaque autem nisi.
                                            At inventore perferendis repellat amet quia perspiciatis. Ex rerum molestias a
                                            amet
                                            labore
                                            accusantium! Quidem rerum nesciunt eligendi dolore quibusdam dolorem excepturi
                                            placeat, quasi
                                            deserunt natus aperiam at!
                                        </div>
                                        <div>
                                            Perihal Lain-lain :
                                        </div>
                                        <div class="bg-grey p-1 rounded">
                                            Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Est ullam debitis,
                                            placeat fuga dignissimos nemo fugiat, alias tenetur sapiente animi architecto
                                            veniam
                                            eos nesciunt
                                            eius consequatur aliquid. Aliquam fugit vel itaque tenetur dignissimos excepturi
                                            unde harum,
                                            perferendis quos animi. Quia rerum nobis rem, autem distinctio veritatis
                                            quisquam
                                            beatae minima
                                            laudantium.
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div>
                                            Tanggal Rapat :
                                        </div>
                                        <div class="bg-grey p-1 rounded">
                                            08-08-2001
                                        </div>
                                        <div>
                                            Perihal Mahasiswa :
                                        </div>
                                        <div class="bg-grey p-1 rounded">
                                            Lorem ipsum dolor sit, amet consectetur
                                            adipisicing elit.
                                            Inventore
                                            reprehenderit quam quos voluptates est, nam dicta, quibusdam distinctio deserunt
                                            itaque autem nisi.
                                            At inventore perferendis repellat amet quia perspiciatis. Ex rerum molestias a
                                            amet
                                            labore
                                            accusantium! Quidem rerum nesciunt eligendi dolore quibusdam dolorem excepturi
                                            placeat, quasi
                                            deserunt natus aperiam at!
                                        </div>
                                        <div>
                                            Perihal Dosen :
                                        </div>
                                        <div class="bg-grey p-1 rounded">
                                            Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Est ullam debitis,
                                            placeat fuga dignissimos nemo fugiat, alias tenetur sapiente animi architecto
                                            veniam
                                            eos nesciunt
                                            eius consequatur aliquid. Aliquam fugit vel itaque tenetur dignissimos excepturi
                                            unde harum,
                                            perferendis quos animi. Quia rerum nobis rem, autem distinctio veritatis
                                            quisquam
                                            beatae minima
                                            laudantium.

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal ubah laporan -->
                <div class="modal fade" id="modalUbah2" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Laporan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div>
                                            Perihal Tendik :
                                        </div>
                                        <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30"
                                            rows="8">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, unde? Sequi doloribus reprehenderit iusto, illo dignissimos nostrum qui saepe natus minus. Provident rem error quibusdam est, quidem voluptates sapiente, deleniti accusantium labore unde aut eligendi. Laborum dolores tempora magni, aliquam asperiores quod consectetur debitis! Pariatur saepe tenetur doloremque eum omnis.
                                        </textarea>
                                        <div>
                                            Perihal Sarana Prasarana :
                                        </div>
                                        <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30"
                                            rows="8">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit impedit incidunt dicta ipsam mollitia aspernatur quis eaque ab assumenda molestiae adipisci, sunt at dignissimos. Distinctio facere iure libero omnis mollitia quaerat maxime, numquam error vel id quis facilis assumenda aspernatur voluptatum in reiciendis sapiente hic recusandae dolorem animi labore corrupti.
                                        </textarea>
                                        <div>
                                            Perihal Lain-lain :
                                        </div>
                                        <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30"
                                            rows="8">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam adipisci assumenda provident officiis et cupiditate doloremque hic, expedita eaque deserunt nesciunt sequi quam, recusandae possimus nihil unde. Eligendi natus ex voluptas dolorem deleniti, accusantium necessitatibus obcaecati eum reiciendis. Corrupti quos ratione fugit saepe. Nihil sapiente, harum qui impedit vitae consectetur!
                                        </textarea>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div>
                                            Tanggal Rapat :
                                        </div>
                                        <input type="text" value="08-08-2001"
                                            class="form-control w-100 bg-grey p-1 rounded tanggalrapat">
                                        <div>
                                            Perihal Mahasiswa :
                                        </div>
                                        <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30"
                                            rows="8">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla odio ex aliquid, quis laborum voluptates deserunt similique in quasi repudiandae! Voluptatibus, error! Officia vero nulla, asperiores temporibus natus esse nobis obcaecati numquam aliquam. Amet, magnam porro labore aperiam quidem nulla, reprehenderit a aliquid eum incidunt iste at, distinctio nobis sequi?
                                        </textarea>
                                        <div>
                                            Perihal Dosen :
                                        </div>
                                        <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30"
                                            rows="8">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem eaque fugit, veritatis ipsam natus alias, aut accusantium quibusdam sunt harum placeat deserunt ad similique perspiciatis quae quisquam velit ea! Amet, hic maxime eius ipsam sequi quos, nobis, aliquid voluptates dicta quo dolor. Inventore nostrum illum tempora, hic dolorem fugit commodi.
                                        </textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-green" data-bs-dismiss="modal">Submit</button>

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">Tanggal Rapat</th>
                    <th class="text-center">Perihal Mahasiswa</th>
                    <th class="text-center">Perihal Dosen</th>
                    <th class="text-center">Perihal Tendik</th>
                    <th class="text-center">Perihal Sarana Prasarana</th>
                    <th class="text-center">Lain-lain</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
@section('foot')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        new DataTable('#example');
    </script>
@endsection
