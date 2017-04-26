<?php

$this->title = 'PLANS TEL';
?>
<div class="site-index">

    <!-- Banner -->
    <div class="banner">
        <img src="images/banner-planos.png" />
    </div>

    <div class="row">

        <!-- Menu -->
        <div class="col-lg-4">
            <nav id="menu">
                <header>
                    Menu
                </header>
                <ul class="nav nav-pills nav-stacked">
                  <li role="presentation" class="active"><a href="#plans" data-toggle="tab">Plans</a></li>
                  <li role="presentation"><a href="#simulator" id="btn-simulator" data-toggle="tab">Simulator</a></li>
                </ul> 
            </nav>                  
        </div>

        <!-- Content Menu -->
        <div class="col-lg-8">
            
            <!-- tabs Content Plans -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="plans">
                <div class="body-content">
                    <header>
                        Plans
                    </header>
                    <?php if (!empty($plans)): ?>
                        <?php foreach ($plans as $plan): ?>
                            <div class="plan plan-<?=$plan->minutes?>">
                                <div class="plan-content">
                                    <div class="title"><?=$plan->name?></div>
                                    <button type="button" plan="<?=$plan->id?>" class="btn-simulator btn btn-default">Simulator</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
              </div>

              <!-- tabs Content Simulator -->
              <div role="tabpanel" class="tab-pane fade" id="simulator">
                <div class="body-content">
                    <header>
                        Simulator
                    </header>
                    <div class="row">
                        <!-- Origin select -->
                        <div class="col-md-3">
                            <select class="form-control" id="origin">
                                <option value="">Origin</option>
                                <?php if (!empty($ddds)): ?>
                                    <?php foreach ($ddds as $ddd): ?>
                                        <option value="<?=$ddd->id?>">0<?=$ddd->ddd?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <!-- Destiny select -->
                        <div class="col-md-3">
                            <select class="form-control" id="destiny">
                                <option value="">Destiny</option>
                                <?php if (!empty($ddds)): ?>
                                    <?php foreach ($ddds as $ddd): ?>
                                        <option value="<?=$ddd->id?>">0<?=$ddd->ddd?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <!-- Minutes input -->
                        <div class="col-md-3">
                            <input type="number" id="minutes" class="form-control" placeholder="Minutos" />
                        </div>

                        <!-- Plans select -->
                        <div class="col-md-3">
                            <select class="form-control" id="plan">
                                <option value="">Plan</option>
                                <?php if (!empty($plans)): ?>
                                    <?php foreach ($plans as $plan): ?>
                                        <option value="<?=$plan->id?>"><?=$plan->name?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <br />

                    <!-- Simulator Result -->
                    <table id="simulator-result" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>With Plan</th>
                                <th>Whithout Plan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="plan-result">$ 00.00</td>
                                <td class="without-plan-result">$ 00.00</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Button Submit -->
                    <button type="button" class="btn btn-accept active" data-toggle="popover" ata-content="t
                This feature not development">Use this plan</button>

                </div>
              </div>

            </div>
        </div>
    </div>
</div>
