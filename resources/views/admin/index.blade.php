
<x-layouts.back-end.application>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-lg-12 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-center row">
                <div class="col-sm-7">
                  <div class="card-body">
                    <h5 class="card-title text-primary">{{ __("admin.welcome back") . ", " . Auth::user()->name }}</h5>
                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="{{ asset("backEnd/assets/img/illustrations/man-with-laptop-light.png") }}"
                      height="140"
                      alt="View Badge User"
                      data-app-dark-img="illustrations/man-with-laptop-dark.png"
                      data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12 col-md-12 order-1">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset("backEnd/assets/img/icons/unicons/wallet-info.png") }}"
                          alt="Credit Card"
                          class="rounded"
                        />
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="{{ route("admin.users.index") }}">{{ __("admin.view more") }}</a>
                        </div>
                      </div>
                    </div>
                    <span>{{ __("admin.all users") }}</span>
                    <h3 class="card-title text-nowrap mb-1">{{ App\Models\User::whereRoleIs("user")->count() }}</h3>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset("backEnd/assets/img/icons/unicons/wallet-info.png") }}"
                          alt="Credit Card"
                          class="rounded"
                        />
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="{{ route("admin.admins.index") }}">{{ __("admin.view all") }}</a>
                        </div>
                      </div>
                    </div>
                    <span>{{ __("admin.all admins") }}</span>
                    <h3 class="card-title text-nowrap mb-1">{{ App\Models\User::whereRoleIs("admin")->count() }}</h3>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset("backEnd/assets/img/icons/unicons/wallet-info.png") }}"
                          alt="Credit Card"
                          class="rounded"
                        />
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="{{ route("admin.ads.index") }}">{{ __("admin.view all") }}</a>
                        </div>
                      </div>
                    </div>
                    <span>{{ __("admin.all ads") }}</span>
                    <h3 class="card-title text-nowrap mb-1">{{ App\Models\Ad::count() }}</h3>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset("backEnd/assets/img/icons/unicons/wallet-info.png") }}"
                          alt="Credit Card"
                          class="rounded"
                        />
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="{{ route("admin.transactions.index") }}">{{ __("admin.view all") }}</a>
                        </div>
                      </div>
                    </div>
                    <span>{{ __("admin.all transactions") }}</span>
                    <h3 class="card-title text-nowrap mb-1">{{ App\Models\Transaction::count() }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Total Revenue -->
          <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
              <div class="row row-bordered g-0">
                <div class="col-md-12">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="m-0 me-2 pb-3" style="display:inline-block">{{ __("admin.Total Ads") }}</h5>
                    <select name="year" id="selected_year" class="col-lg-2 py-2">
                      <option value="{{ now()->year }}" {{ now()->year ? "selected" : "" }}>{{ now()->year }}</option>
                    </select>
                  </div>
                  <div id="totalRevenueChart" class="px-2"></div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Total Revenue -->
        </div>
    </div>

    @push('scripts')
      <script>
        (function () {
          let cardColor, headingColor, axisColor, shadeColor, borderColor;

          cardColor = config.colors.white;
          headingColor = config.colors.headingColor;
          axisColor = config.colors.axisColor;
          borderColor = config.colors.borderColor;

          // Total Revenue Report Chart - Bar Chart
          // --------------------------------------------------------------------
          const totalRevenueChartEl = document.querySelector("#totalRevenueChart"),
            totalRevenueChartOptions = {
                series: [
                    {
                      name: "{{ __('admin.Total Ads') }}",
                      data: @json($ads->pluck('total_ads')),
                    },
                ],
                chart: {
                    height: 300,
                    stacked: true,
                    type: "bar",
                    toolbar: { show: false },
                },
                plotOptions: {
                  bar: {
                      horizontal: false,
                      columnWidth: "33%",
                      borderRadius: 12,
                      startingShape: "rounded",
                      endingShape: "rounded",
                  },
                },
                colors: [config.colors.primary, config.colors.info],
                dataLabels: {
                  enabled: false,
                },
                stroke: {
                    curve: "smooth",
                    width: 6,
                    lineCap: "round",
                    colors: [cardColor],
                },
                legend: {
                    show: true,
                    horizontalAlign: "left",
                    position: "top",
                    markers: {
                        height: 8,
                        width: 8,
                        radius: 12,
                        offsetX: -3,
                    },
                    labels: {
                        colors: axisColor,
                    },
                    itemMargin: {
                        horizontal: 10,
                    },
                },
                grid: {
                  borderColor: borderColor,
                  padding: {
                    top: 0,
                    bottom: -8,
                    left: 20,
                    right: 20,
                  },
                },
                xaxis: {
                  categories: @json($ads->pluck('month')),
                  labels: {
                    style: {
                      fontSize: "13px",
                      colors: axisColor,
                    },
                  },
                  axisTicks: {
                    show: false,
                  },
                  axisBorder: {
                    show: false,
                  },
                },
                yaxis: {
                  labels: {
                    style: {
                      fontSize: "13px",
                      colors: axisColor,
                    },
                  },
                },
                responsive: [
                  {
                    breakpoint: 1700,
                    options: {
                      plotOptions: {
                        bar: {
                          borderRadius: 10,
                          columnWidth: "32%",
                        },
                      },
                    },
                  },
                  {
                    breakpoint: 1580,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "35%",
                            },
                        },
                    },
                  },
                  {
                    breakpoint: 1440,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "42%",
                            },
                        },
                    },
                  },
                  {
                    breakpoint: 1300,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "48%",
                            },
                        },
                    },
                  },
                  {
                    breakpoint: 1200,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "40%",
                            },
                        },
                    },
                  },
                  {
                      breakpoint: 1040,
                      options: {
                          plotOptions: {
                              bar: {
                                  borderRadius: 11,
                                  columnWidth: "48%",
                              },
                          },
                      },
                  },
                  {
                      breakpoint: 991,
                      options: {
                          plotOptions: {
                              bar: {
                                  borderRadius: 10,
                                  columnWidth: "30%",
                              },
                          },
                      },
                  },
                  {
                      breakpoint: 840,
                      options: {
                          plotOptions: {
                              bar: {
                                  borderRadius: 10,
                                  columnWidth: "35%",
                              },
                          },
                      },
                  },
                  {
                      breakpoint: 768,
                      options: {
                          plotOptions: {
                              bar: {
                                  borderRadius: 10,
                                  columnWidth: "28%",
                              },
                          },
                      },
                  },
                  {
                      breakpoint: 640,
                      options: {
                          plotOptions: {
                              bar: {
                                  borderRadius: 10,
                                  columnWidth: "32%",
                              },
                          },
                      },
                  },
                  {
                      breakpoint: 576,
                      options: {
                          plotOptions: {
                              bar: {
                                  borderRadius: 10,
                                  columnWidth: "37%",
                              },
                          },
                      },
                  },
                  {
                      breakpoint: 480,
                      options: {
                          plotOptions: {
                              bar: {
                                  borderRadius: 10,
                                  columnWidth: "45%",
                              },
                          },
                      },
                  },
                  {
                      breakpoint: 420,
                      options: {
                          plotOptions: {
                              bar: {
                                  borderRadius: 10,
                                  columnWidth: "52%",
                              },
                          },
                      },
                  },
                  {
                      breakpoint: 380,
                      options: {
                          plotOptions: {
                              bar: {
                                  borderRadius: 10,
                                  columnWidth: "60%",
                              },
                          },
                      },
                  },
                ],
                states: {
                    hover: {
                        filter: {
                            type: "none",
                        },
                    },
                    active: {
                        filter: {
                            type: "none",
                        },
                    },
                },
            };

            if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
              const totalRevenueChart = new ApexCharts(
                  totalRevenueChartEl,
                  totalRevenueChartOptions
              );
              totalRevenueChart.render();
            }
        })();

        $(function () {
          $("#selected_year").on("change", function () {
            let year = $(this).find(":selected").val();

            $.ajax({
              type: "GET",
              url: '{{ route("admin.get_total_ads") }}',
              data: {
                "year": year
              },
              cache: false,

              success: function (response) {
                // $("#totalRevenueChart").html(response);
              }
            });
          });
        });
      </script>
    @endpush

</x-layouts.back-end.application>
