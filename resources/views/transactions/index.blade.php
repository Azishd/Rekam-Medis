<!DOCTYPE html>
<html>
<head>
    <title>Transaction History</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

{{-- Header --}}
<header>
    <div class="flex flex-col pt-3.5 bg-white">
        <div class="flex gap-5 w-full max-md:flex-wrap max-md:pr-5 max-md:max-w-full">
        <div class="flex flex-col flex-auto max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full">
                <img src="{{ URL('storage/logo.png') }}" alt="Company logo" class="grow w-full aspect-[2.04] max-md:mt-10" />
            </div>
            <nav class="flex flex-col ml-5 w-[33%] max-md:ml-0 max-md:w-full">
                <ul class="flex gap-5 justify-between self-stretch p-2.5 my-auto text-xl font-semibold text-black max-md:flex-wrap max-md:mt-10">
                <li><a href="/dashboard">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                </ul>
            </nav>
            <div class="flex flex-col ml-5 w-[33%] max-md:ml-0 max-md:w-full">
                <img src="{{ URL('storage/profile.png') }}" alt="Profile icon" class="self-center m-auto aspect-square w-[111px]" />
                <a href="/profileedit" class="mx-auto mt-1 mb-auto font-semibold text-center">Profile</a>
                <form class="mx-auto mt-1 mb-auto font-semibold text-center" method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
            </div>
        </div>
    </div>
</header>

<body>
    <div style="margin: 0px auto" class="flex justify-center px-10 py-2.5 mt-14 max-w-full text-xl font-semibold text-white whitespace-nowrap bg-emerald-400 rounded-3xl w-[649px]">
        Transaction History
    </div>
    <br>
    <div class="relative overflow-x-auto">
      <table id="transaction_history" class="w-10/12 text-sm text-left rtl:text-right text-gray-950 dark:text-gray-950" style="margin: 0px auto">
          <thead>
              <tr>
                  <th onclick="sortTable(0)" scope="col" class="px-6 py-3">No</th>
                  <th onclick="sortTable(1)" scope="col" class="px-6 py-3">Date</th>
                  <th onclick="sortTable(2)" scope="col" class="px-6 py-3">Product</th>
                  <th onclick="sortTable(3)" scope="col" class="px-6 py-3">Quantity</th>
                  <th onclick="sortTable(4)" scope="col" class="px-6 py-3">Status</th>
              </tr>
          </thead>
          @foreach ($transactions as $transaction)
          <tbody>
              <tr>
                  <td class="bg-white border-b dark:border-gray-700">{{ $transaction->id }}</td>
                  <td class="bg-white border-b dark:border-gray-700">{{ $transaction->date }}</td>
                  <td class="bg-white border-b dark:border-gray-700">{{ $transaction->product }}</td>
                  <td class="bg-white border-b dark:border-gray-700">{{ $transaction->quantity }}</td>
                  <td class="bg-white border-b dark:border-gray-700">{{ $transaction->status }}</td>
              </tr>
          </tbody>
          @endforeach
      </table>
    </div>

    <script>
      function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("transaction_history");
        switching = true;
        //Set the sorting direction to ascending:
        dir = "asc"; 
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
          //start by saying: no switching is done:
          switching = false;
          rows = table.rows;
          /*Loop through all table rows (except the
          first, which contains table headers):*/
          for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
            if (dir == "asc") {
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch= true;
                break;
              }
            } else if (dir == "desc") {
              if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
            }
          }
          if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount ++;      
          } else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
              dir = "desc";
              switching = true;
            }
          }
        }
      }
      </script>

</body>

{{-- Footer --}}
<footer>
    <footer class="flex flex-col px-9 pt-9 pb-20 mt-32 w-full bg-emerald-400 max-md:px-5 max-md:mt-10 max-md:max-w-full">
        <div class="flex gap-5 justify-between max-md:flex-wrap max-md:max-w-full">
          <img src="{{ URL('storage/logo.png') }}" alt="Footer illustration" class="w-full max-w-[360px]" />
          <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/77a74444dce46770de2ea56960892321997e0c30cfcfd41a62aa8d1f4a00d6d8?apiKey=2d4ec82762644cb186989ef33564f502&" alt="Company logo" class="self-start mt-6 aspect-[10] w-[379px]" />
        </div>
        <div class="self-center mt-9 mb-2 max-w-full w-[811px]">
          <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <section class="flex flex-col w-[58%] max-md:ml-0 max-md:w-full">
              <div class="flex flex-col text-white max-md:mt-10">
                <h2 class="text-2xl font-bold">About Us</h2>
                <p class="mt-4 text-base">Kami adalah mitra Anda dalam perjalanan <br /> menuju hidup yang lebih sehat dan bahagia</p>
              </div>
            </section>
            <nav class="flex flex-col ml-5 w-[28%] max-md:ml-0 max-md:w-full">
              <div class="flex flex-col grow text-base text-white max-md:mt-10">
                <h2 class="text-2xl font-bold">Useful Links</h2>
                <ul>
                  <li class="mt-4"><a href="#">About us</a></li>
                  <li class="mt-4"><a href="#">Our mission</a></li>
                  <li class="mt-4"><a href="#">Our team</a></li>
                </ul>
              </div>
            </nav>
            <nav class="flex flex-col ml-5 w-[14%] max-md:ml-0 max-md:w-full">
              <div class="flex flex-col grow text-base text-white max-md:mt-10">
                <h2 class="text-2xl font-bold">More</h2>
                <ul>
                  <li class="mt-4"><a href="#">About us</a></li>
                  <li class="mt-4"><a href="#">Our mission</a></li>
                  <li class="mt-4"><a href="#">Our team</a></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
    </footer>
</footer>

</html>
