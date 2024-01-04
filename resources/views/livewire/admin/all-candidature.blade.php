<div class="container">
    <div class="col-lg-12 col-md-8 col-12">
        <div class="card mb-4">
            <div class="p-4 d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mb-0">Toutes les candidatures</h3>
                    <span>toutes les candidatures engagées par utilisateurs .</span>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-header border-bottom-0">
                <div class="row">
                    <div class="col pe-0">
                     <input type="search"  wire:model.live="search"  class="form-control" placeholder="Rechercher">
                    </div>
                    <div class="col-auto">
                        <a href="" class="btn btn-secondary">Export CSV</a>
                        <a href="#" class="btn btn-outline-warning">Export PDF</a>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="table-responsive">
                <table  id="myTable"  class="table table-hover table-centered">
                    <thead class="table-light">
                        <tr>
                            <th>Nom Prénom</th>
                            <th>Matricule</th>
                            <th>Télephone</th>
                            <th>Id permanent</th>
                            <th>Proprietaire</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allCandidatures as $candidature)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/photos/'.$candidature->photo) }}" alt="" class="rounded-circle avatar-md me-2">
                                    <h5 class="mb-0">{{$candidature->nom}} {{$candidature->prenom}}</h5>
                                </div>
                            </td>
                            <td>{{$candidature->matricule}}</td>
                            <td>{{$candidature->telephone}}</td>
                            <td>{{$candidature->identifiant_permanent}}</td>
                            <td>
                                {{$candidature->owner?->name}}
                            </td>

                            <td>
                                {{$candidature->created_at->diffForHumans()}}
                            </td>
                            <td class="pe-0 align-middle border-top-0">
                                <a href="https://wa.me/{{$candidature->telephone}}?text=Je vous contacte pour votre candidature" class="btn btn-outline-secondary btn-sm" target="_blank"><i class="fa fa-whatsapp"></i> </a>
                               <button wire:click="valider({{$candidature->id}})" class="btn btn-outline-success btn-sm">Valider</button>
                                <a href="{{route('candidature.show', $candidature->id)}}" class="btn btn-outline-success btn-sm" wire:navigate>Consulter</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pt-2 pb-4">
                <nav>
                    <ul class="pagination justify-content-center mb-0">
                        {{$allCandidatures->links()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
   </div>
