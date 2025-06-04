<!-- Modal Pembayaran -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Menambahkan modal-lg untuk ukuran lebih besar -->
    <div class="modal-content p-4">
      <div class="modal-header border-0 text-center">
        <h5 class="modal-title fw-bold w-100" id="paymentModalLabel">Pilih Metode Pembayaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <div class="row">

          <!-- Bayar Langsung -->
          <div class="col-4 text-center mb-3">
            <a href="{{ url('/pembayaran/cash') }}" class="btn w-100 border border-dark" style="border-width: 2px;">
              <img src="{{ asset('image/Gambar Uang.png') }}" alt="Cash" width="70" height="70"><br>
              <small class="text-dark fw-bold">Cash</small>
            </a>
          </div>

          <!-- Dana -->
          <div class="col-4 text-center mb-3">
            <a href="{{ url('/pembayaran/dana') }}" class="btn w-100 border border-dark" style="border-width: 2px;">
              <img src="{{ asset('image/Logo Dana.png') }}" alt="Dana" width="70" height="70"><br>
              <small class="text-dark fw-bold">Dana</small>
            </a>
          </div>

          <!-- BRI -->
          <div class="col-4 text-center mb-3">
            <a href="{{ url('/pembayaran/bri') }}" class="btn w-100 border border-dark" style="border-width: 2px;">
              <img src="{{ asset('image/Logo BRI.png') }}" alt="BRI" width="70" height="70"><br>
              <small class="text-dark fw-bold">BRI</small>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
