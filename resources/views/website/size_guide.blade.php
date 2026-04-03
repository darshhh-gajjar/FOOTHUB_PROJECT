@extends('website.layouts.app')

@section('title', 'Size Guide - Foot Hub India')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold text-uppercase mb-5">Size Guide</h2>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>US Size</th>
                            <th>UK Size</th>
                            <th>EU Size</th>
                            <th>CM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>7</td><td>6</td><td>40</td><td>25</td></tr>
                        <tr><td>7.5</td><td>6.5</td><td>40.5</td><td>25.5</td></tr>
                        <tr><td>8</td><td>7</td><td>41</td><td>26</td></tr>
                        <tr><td>8.5</td><td>7.5</td><td>42</td><td>26.5</td></tr>
                        <tr><td>9</td><td>8</td><td>42.5</td><td>27</td></tr>
                        <tr><td>9.5</td><td>8.5</td><td>43</td><td>27.5</td></tr>
                        <tr><td>10</td><td>9</td><td>44</td><td>28</td></tr>
                        <tr><td>10.5</td><td>9.5</td><td>44.5</td><td>28.5</td></tr>
                        <tr><td>11</td><td>10</td><td>45</td><td>29</td></tr>
                    </tbody>
                </table>
            </div>
            <p class="text-muted mt-3 text-center small">* Use this chart as a general guide. Sizing may vary by brand.</p>
        </div>
    </div>
</div>
@endsection
