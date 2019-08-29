<section class="tracem-portfolio-area tracem-relative portfolio-grid is-animation <?php echo esc_attr( $settings['portfolio_hover_types'] ); ?>" id="tracem-portfolio">
    <div class="container-fluid">
        <div class="row">
            <?php
            while( $portfolio->have_posts() ) : $portfolio->the_post();
            $portfolio_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );

            $t_video_url = '';
            if( function_exists( 'cs_get_option' ) ) {
                $_tracem_portfolio_options = get_post_meta( get_the_ID(), '_tracem_portfolio_options', true );
                $t_video_url = isset( $_tracem_portfolio_options['tracem_portfolio_video_url'] ) ? $_tracem_portfolio_options['tracem_portfolio_video_url'] : '';
            }
            ?>

                <div class="col-lg-<?php echo esc_attr( $settings['portfolio_column'] ) ?> col-md-6 col-12 grid">
                    <div class="grid__item">
                        <div class="portfolio-grid-wrapper">
                            <div class="scroll-img <?php echo esc_attr( $settings['t_portfolio_type'] ); ?>" style="background-image: url(<?php echo esc_url( $portfolio_thumb ); ?>);">
                            </div>
                            <div class="portfolio-overlay">
                                <?php
                                    if( $settings['portfolio_hover_types'] == 'link-reveal' || $settings['portfolio_hover_types'] == 'boxed' || $settings['portfolio_hover_types'] == 'boxed-large' ) {
                                        echo '<div class="tracem-ovh"><span class="arrow"><a href="' . esc_url( get_permalink() ) . '"><i class="ti-arrow-right"></i></a></span></div>';
                                    }
                                ?>
                            </div>
                            <div class="portfolio-details">
                                <div class="portfolio-cats">
                                    <div class="tracem-ovh">
                                        <h4><?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ' ); ?></h4>
                                    </div><!-- .tracem-ovh -->
                                </div><!-- .portfolio-cats -->
                                <div class="portfolio-title">
                                    <div class="tracem-ovh">
                                        <?php
                                        the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
                                    </div><!-- .tracem-ovh -->
                                </div><!-- .portfolio-title -->
                            </div><!-- .portfolio-details -->
                            <?php
                            if( ! empty( $t_video_url ) ) : ?>
                                <div class="tracem-ovh">
                                    <div class="port-video-btn">
                                        <a class="mixed" data-flashy-type="video" href="<?php echo esc_url( $t_video_url ); ?>">
                                            <img src="<?php echo esc_url( plugins_url( 'tracem-shortcode/assets/images/play-icon.png' ) ); ?>" alt="<?php echo esc_attr__( 'Video Button', 'tracem' ); ?>">
                                        </a>
                                    </div><!-- .port-video-btn -->
                                </div><!-- .tracem-ovh -->
                            <?php endif; ?>
                        </div><!-- .portfolio-grid-wrapper -->
                    </div>
                </div><!-- .col-md-4 .col-sm-12 .grid -->

            <?php endwhile; wp_reset_postdata(); ?>
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</section><!-- .tracem-portfolio-area -->

<script>
    ;(function($){
        "use strict";
        $(document).ready(function () {

            if( document.querySelector('.grid > .grid__item') !== null )
            {
                // the settings for each one of the slides uncover instances.
                const uncoverOpts = [
                    {
                        // total number of slices.
                        slicesTotal: 5,
                        // slices color.
                        slicesColor: '#fff',
                        // 'vertical' || 'horizontal'.
                        orientation: 'vertical',
                        // 'bottom' || 'top' for vertical orientation and 'right' || 'left' for horizontal orientation.
                        slicesOrigin: {show: 'top', hide: 'top'}
                    },
                    {
                        slicesTotal: 8, 
                        slicesColor: '#fff', 
                        orientation: 'horizontal', 
                        slicesOrigin: {show: 'left', hide: 'left'}
                    },
                    {
                        slicesTotal: 11,
                        slicesColor: '#fff',
                        orientation: 'horizontal',
                        slicesOrigin: {show: 'right', hide: 'right'}
                    },
                    {
                        slicesTotal: 3,
                        slicesColor: '#fff',
                        orientation: 'vertical',
                        slicesOrigin: {show: 'bottom', hide: 'bottom'}
                    },
                    {
                        slicesTotal: 16,
                        slicesColor: '#fff',
                        orientation: 'vertical',
                        slicesOrigin: {show: 'bottom', hide: 'bottom'}
                    },
                    {
                        slicesTotal: 4,
                        slicesColor: '#fff',
                        orientation: 'horizontal',
                        slicesOrigin: {show: 'left', hide: 'left'}
                    },
                    {
                        slicesTotal: 10,
                        slicesColor: '#fff',
                        orientation: 'vertical',
                        slicesOrigin: {show: 'top', hide: 'top'}
                    },
                    {
                        slicesTotal: 8,
                        slicesColor: '#d60b3f',
                        orientation: 'horizontal',
                        slicesOrigin: {show: 'right', hide: 'right'}
                    },
                    {
                        slicesTotal: 6,
                        slicesColor: '#250bd6',
                        orientation: 'vertical',
                        slicesOrigin: {show: 'top', hide: 'top'}
                    }
                ];

                const uncoverAnimation = [
                    {
                        show: {
                            slices: {duration: 600, delay: (_,i,t) => (t-i-1)*100, easing: 'easeInOutCirc'}
                        },
                        hide: {
                            slices: {duration: 600, delay: (_,i,t) => (t-i-1)*100, easing: 'easeInOutCirc'}
                        }
                    },
                    {
                        show: {
                            slices: {duration: 600, delay: (_,i,t) => Math.abs(t/2-i)*80, easing: 'easeInOutCirc'}
                        },
                        hide: {
                            slices: {duration: 300, delay: (_,i,t) => Math.abs(t/2-i)*40, easing: 'easeInOutCirc'}
                        }
                    },
                    {
                        show: {
                            slices: {delay: (_,i,t) => anime.random(0,t)*50}
                        },
                        hide: {
                            slices: {duration: 300, delay: (_,i,t) => anime.random(0,t)*50}
                        }
                    },
                    {
                        show: {
                            slices: {duration: 1200, delay: (_,i) => i*150, easing: 'easeOutExpo'}
                        },
                        hide: {
                            slices: {duration: 500, delay: (_,i) => i*150, easing: 'easeInOutExpo'}
                        }
                    },
                    {
                        show: {
                            slices: {duration: 600, delay: (_,i,t) => Math.abs(t/2-i)*80, easing: 'easeInOutCirc'}
                        },
                        hide: {
                            slices: {duration: 600, delay: (_,i,t) => Math.abs(t/2-i)*80, easing: 'easeInOutCirc'}
                        }
                    },
                    {
                        show: {
                            slices: {duration: 400, delay: (_,i,t) => (t-i-1)*150, easing: 'easeInOutQuad'}
                        },
                        hide: {
                            slices: {duration: 400, delay: (_,i,t) => (t-i-1)*30, easing: 'easeInOutQuad'}
                        }
                    },
                    {
                        show: {
                            slices: {duration: 400, delay: (_,i,t) => Math.abs(t/4-i)*40, easing: 'easeInOutSine'},
                            image: {
                                duration: 900,
                                easing: 'easeOutCubic',
                                scale: [1.8,1]
                            }
                        },
                        hide: {
                            slices: {duration: 400, delay: (_,i,t) => Math.abs(t/4-i)*40, easing: 'easeInOutSine'}
                        }
                    },
                    {
                        show: {
                            slices: {duration: 600, easing: 'easeInOutCirc', delay: (_,i) => i*50},
                            image: {
                                duration: 1200,
                                delay: 350,
                                easing: 'easeOutCubic',
                                scale: [1.3,1]
                            }
                        },
                        hide: {
                            slices: {duration: 300, easing: 'easeInOutCirc', delay: (_,i) => i*30}
                        }
                    },
                    {
                        show: {
                            slices: {duration: 600, easing: 'easeInOutCirc', delay: (_,i) => i*100},
                            image: {
                                duration: 1200,
                                delay: 350,
                                easing: 'easeOutCubic',
                                scale: [1.3,1]
                            }
                        },
                        hide: {
                            slices: {duration: 300, easing: 'easeInOutCirc', delay: (_,i) => i*40}
                        }
                    }
                ];

                const items = Array.from(document.querySelectorAll('.grid > .grid__item'));
                
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if ( entry.intersectionRatio > 0.5 ) {
                            uncoverArr[items.indexOf(entry.target)].show(true, uncoverAnimation[items.indexOf(entry.target)].show);
                        }
                        else {
                            uncoverArr[items.indexOf(entry.target)].hide(true, uncoverAnimation[items.indexOf(entry.target)].hide);
                        }
                    });
                }, { threshold: 0.5 });
                
                let uncoverArr = [];

                imagesLoaded(document.querySelectorAll('.scroll-img'), {background: true}, () => {
                    document.body.classList.remove('loading');

                    items.forEach((item, pos) => {
                        uncoverArr.push(new Uncover(item.querySelector('.scroll-img'), uncoverOpts[pos]));
                        observer.observe(item);
                    });
                });
            }
        });
    })(jQuery)
</script>