@extends('layout.base')

@section('content')
    <div class="container">
        <div class="grid">
            <h1 class="app">CandidHero</h1>

            <div class="aside-login">
                <div class="well-text">
                    <h3>connectez-vous à votre compte</h3>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur.molestias? Obcaecati
                        doloribus labore
                    </p>
                </div>
                <form action="{{ route('auth.register') }}" class="form-container" method="POST">
                    @method('post')
                    <div class="input-space">
                        <label for="firsname">Nom Complet</label>
                        <input type="text" id="firsname" class="input"
                            placeholder="Veuillez entrer votre nom complet" />
                    </div>
                    <div class="input-space">
                        <label for="">Adresse Email</label>
                        <input type="email" class="input" placeholder="Veuillez entrer votre email" />
                    </div>
                    <div class="input-space">
                        <label for="">Mot de passe</label>
                        <input type="password" class="input" placeholder="Veuillez entrer votre mot de passe" />
                    </div>
                    <div class="input-space">
                        <label for="">Confirmation</label>
                        <input type="password" class="input" placeholder="Confirmer votre mot de passe" />
                    </div>
                    <div class="checkbox">
                        <div class="d-flex-column">
                            <div class="checked">
                                <input type="checkbox" class="check" />
                                <label for="checked" class="check-text">Se souvenir de moi</label>
                            </div>
                            <strong>Se connecter en tant que</strong>
                            <div class="checked">
                                <input type="checkbox" class="check" id="is_recruit" />
                                <label for="checked" class="check-text">Candidat</label>
                            </div>
                            <div class="checked">
                                <input type="checkbox" class="check" id="is_recruiter" />
                                <label for="checked" class="check-text">Recruteur</label>
                            </div>
                        </div>
                        <a href="">Mot de passe oublié</a>
                    </div>
                    <a href="" class="btn-primary">S'inscrire</a>
                </form>
            </div>
        </div>
        <div class="grid">
            <div class="aside">
                <img src="../assets/icons/log-icon (2).svg" alt="" />
                <h3>
                    Avez-vous déjà un compte ?
                </h3>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non animi,
                    ad quidem ea deserunt placeat modi, distinctio maiores voluptate
                    earum, totam eius quo debitis iure quod incidunt cum. Cupiditate,
                    eveniet.
                </p>
                <a href="{{ route('login') }}" class="btn-secondary">Se Connecter</a>
            </div>
        </div>
    </div>
@endsection
